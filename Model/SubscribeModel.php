<?php

namespace Model;


class SubscribeModel extends BaseModel
{
    protected $table = 'print_subscribes';

    protected $validations = array(
        'email' => array(
            'pattern' => '/^[a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9\-\_\.]+[a-zA-Z]{2,5}$/i',
        ),
    );

    /*
     * Inserts new subscriber's email
     */
    public function subscribe($data)
    {
        $email = $this->db->escape($data['email']);
        $email = htmlspecialchars($email);

        $sql = "INSERT INTO `{$this->table}` SET `email` = '{$email}';";

        return $this->db->query($sql);
    }
}