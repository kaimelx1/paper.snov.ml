<?php

namespace Model;

use Model\UserModel;

class OrderModel extends BaseModel
{

    protected $table = 'print_ordered_items';

    protected $validations = array(
        'name' => array(
            'min' => 1,
            'max' => 30,
        ),
        'phone' => array(
            'min' => 10,
            'max' => 12,
        ),
        'email' => array(
            'pattern' => '/^[a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9\-\_\.]+[a-zA-Z]{2,5}$/i',
        ),
    );

    /*
     * Inserts new order & returns its id
     */
    public function order($data, $session)
    {

        $data['name'] = $this->db->escape($data['name']);
        $data['phone'] = $this->db->escape($data['phone']);
        $data['email'] = $this->db->escape($data['email']);
        //SPECIAL
        $data['name'] = htmlspecialchars($data['name']);
        $data['phone'] = htmlspecialchars($data['phone']);
        $data['email'] = htmlspecialchars($data['email']);
        //INT
        $id = (int)$data['id'];

        //ITEMS
        $total = (int)$session['total'];
        $items = json_encode($session['items']);

        $sql = "INSERT INTO `{$this->table}` (`user_id`, `items`, `total_sum`, `name`, `phone`, `email`) 
                VALUES ({$id}, '{$items}', {$total}, '{$data['name']}', '{$data['phone']}', '{$data['email']}');
                ";

        if($this->db->query($sql)) {
            return $this->db->lastId();
        }

        return false;
    }

    /*
     * Selects orders by user's id
     */
    public function showList($id)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE `user_id` = {$id};";
        $result = $this->db->query($sql);

        $this->ifNot($result);
        return $result;
    }
}