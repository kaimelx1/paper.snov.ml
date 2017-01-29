<?php

namespace Model;


class UserModel extends BaseModel
{
    protected $table = 'print_users';

    protected $validations = array(
        'name' => array(
            'min' => 1,
            'max' => 30,
        ),
        'password' => array(
            'min' => 1,
            'max' => 50,
        ),
        'email' => array(
            'pattern' => '/^[a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9\-\_\.]+[a-zA-Z]{2,5}$/i',
        ),
    );

    /*
     * Selects user by comparing data
     */
    public function login($data)
    {
        $data['password'] = $this->db->escape($data['password']);
        //SALT
        $data['password'] = md5(SALT . $data['password']);
        $data['email'] = $this->db->escape($data['email']);

        $sql = "SELECT * FROM `{$this->table}` 
                  WHERE `password` = '{$data['password']}' 
                  AND `email` = '{$data['email']}';
        ";

        if ($result = $this->db->query($sql)) {
            return $result[0];
        }

        return false;
    }

    /*
     * Inserts new user
     */
    public function register($data)
    {
        $data['name'] = $this->db->escape($data['name']);
        $data['password'] = $this->db->escape($data['password']);
        $data['email'] = $this->db->escape($data['email']);
        //SPECIAL
        $data['name'] = htmlspecialchars($data['name']);
        $data['email'] = htmlspecialchars($data['email']);
        //SALT
        $data['password'] = SALT . htmlspecialchars($data['password']);

        $sql = "INSERT INTO `{$this->table}` (`name`, `email`, `password`)
                VALUES ('{$data['name']}', '{$data['email']}', md5('{$data['password']}'));
        ";

        return $this->db->query($sql);
    }

    /*
    * Returns user's id by his email
    */
    public function getUserId($email)
    {

        $sql = "SELECT `id` FROM `{$this->table}` 
                  WHERE `email` = '{$email}';
        ";

        if ($result = $this->db->query($sql)) {
            return (int)$result[0]['id'];
        }

        return false;
    }

    /*
    * Updates user's information
    */
    public function dataUpdate($data)
    {

        $data['name'] = $this->db->escape($data['name']);
        $data['email'] = $this->db->escape($data['email']);
        //SPECIAL
        $data['name'] = htmlspecialchars($data['name']);
        $data['email'] = htmlspecialchars($data['email']);

        if (!$data['id']) {
            return false;
        }

        $sql = "UPDATE `{$this->table}` SET `name` = '{$data['name']}', `email` = '{$data['email']}'
                WHERE `id` = '{$data['id']}';
        ";

        if ($result = $this->db->query($sql)) {
            $_SESSION['user'] = $data['name'];
            $_SESSION['userEmail'] = $data['email'];
        }

        return $result;
    }

    /*
    * Updates user's password
    */
    public function passwordUpdate(array $data)
    {
        $data['password'] = $this->db->escape($data['newPassword']);
        //SPECIAL
        $data['password'] = SALT . htmlspecialchars($data['password']);

        if (!$data['id']) {
            return false;
        }

        $sql = "UPDATE `{$this->table}` SET `password` = md5('{$data['password']}')
                WHERE `id` = '{$data['id']}';
        ";

        if ($result = $this->db->query($sql)) {
            $_SESSION['userPassword'] = md5($data['password']);
        }

        return $result;
    }
}