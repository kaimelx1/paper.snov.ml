<?php

namespace Model;

class OrderPartnersModel extends BaseModel
{

    protected $table = 'print_ordered_partners_items';

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
        'quantity' => array(
            'mint' => 1,
        ),
    );

    /*
     * Inserts new order & returns its id
     */
    public function order($data)
    {

        $data['name'] = $this->db->escape($data['name']);
        $data['phone'] = $this->db->escape($data['phone']);
        $data['email'] = $this->db->escape($data['email']);
        //SPECIAL
        $data['name'] = htmlspecialchars($data['name']);
        $data['phone'] = htmlspecialchars($data['phone']);
        $data['email'] = htmlspecialchars($data['email']);
        //INT
        $userId = (int)$data['id'];
        $itemId = (int)$data['itemId'];
        $quantity = (int)$data['quantity'];
        $price = (int)$data['price'];

        $total = (int)$data['quantity'] * (int)$data['price'];

        $sql = "INSERT INTO `{$this->table}` (`user_id`, `item_id`, `price`, `quantity`, `total_sum`, `name`, `phone`, `email`) 
                VALUES ({$userId}, {$itemId}, {$price}, {$quantity}, {$total}, '{$data['name']}', '{$data['phone']}', '{$data['email']}');
                ";

        if ($this->db->query($sql)) {
            return $this->db->lastId();
        }

        return false;
    }
}