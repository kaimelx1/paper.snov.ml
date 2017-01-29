<?php

namespace Model;

class ContactModel extends BaseModel {

    protected $table = 'print_messages';

    protected $validations = array(
        'name' => array(
            'min' => 1,
            'max' => 30,
        ),
        'phone' => array(
            'min' => 9,
            'max' => 12,
        ),
        'subject' => array(
            'min' => 1,
            'max' => 1000,
        ),
        'message' => array(
            'min' => 1,
            'max' => 1000,
        ),
        'email' => array(
            'pattern' => '/^[a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9\-\_\.]+[a-zA-Z]{2,5}$/i',
        ),
    );

    /*
     * Inserts message
     */
    public function putMessage($data)
    {
        $data['name'] = $this->db->escape($data['name']);
        $data['phone'] = $this->db->escape($data['phone']);
        $data['email'] = $this->db->escape($data['email']);
        $data['subject'] = $this->db->escape($data['subject']);
        $data['message'] = $this->db->escape($data['message']);
        //HTMLSPECIAL
        $data['name'] = htmlspecialchars($data['name']);
        $data['phone'] = htmlspecialchars($data['phone']);
        $data['email'] = htmlspecialchars($data['email']);
        $data['subject'] = htmlspecialchars($data['subject']);
        $data['message'] = htmlspecialchars($data['message']);

        $sql = " INSERT INTO `{$this->table}`
                    SET `name` = '{$data['name']}',
                        `phone` = '{$data['phone']}',
                        `email` = '{$data['email']}',
                        `subject` = '{$data['subject']}',
                        `message` = '{$data['message']}';
        ";

        return $this->db->query($sql);
    }
}