<?php

namespace Model;

class ItemCommentModel extends BaseModel
{
    protected $table = 'print_item_comments';

    protected $validations = array(
        'author' => array(
            'min' => 1,
            'max' => 30,
        ),
        'content' => array(
            'min' => 1,
            'max' => 500,
        ),
    );

    /*
     * Inserts item's comment
     */
    public function putItemComment($data)
    {
        $data['author'] = $this->db->escape($data['author']);
        $data['content'] = $this->db->escape($data['content']);
        $data['author'] = htmlspecialchars($data['author']);
        $data['content'] = htmlspecialchars($data['content']);

        $sql = " INSERT INTO `{$this->table}`
                    SET `author` = '{$data['author']}',
                        `item_id` = '{$data['itemId']}',
                        `content` = '{$data['content']}';
        ";

        return $this->db->query($sql);
    }

    /*
     * Selects item's comments by item's id
     */
    public function getComments($id) {
        $id = intval($id);

        $result = $this->db->query("SELECT * FROM `{$this->table}` WHERE `item_id` = {$id} ORDER BY `date` DESC;");

        $this->ifNot($result);

        return $result;
    }

    /*
     * Deletes item's comment by item's id
     */
    public function deleteWhenItem($id)
    {
        $sql = "DELETE FROM `{$this->table}` WHERE `item_id` = {$id};";
        return $this->db->query($sql);
    }
}