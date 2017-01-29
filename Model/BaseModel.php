<?php

namespace Model;


use Common\DB;
use Common\DbCache;

class BaseModel
{
    protected $db;
    protected $table;
    protected $validations = array();

    public function __construct()
    {
        $this->db = new DB();
    }

    /*
     * Validation
     */
    public function validate($array)
    {
        foreach ($this->validations as $field => $rules) {
            foreach ($rules as $rule => $value) {
                switch ($rule) {

                    case 'min':
                        if (isset($array[$field]) && iconv_strlen($array[$field]) < $value) {
                            return "Поле {$field} должно быть больше {$value} символа(-ов)";
                        }

                        break;

                    case 'max':
                        if (isset($array[$field]) && iconv_strlen($array[$field]) > $value) {
                            return "Поле {$field} должно быть меньше {$value} символа(-ов)";
                        }

                        break;

                    case 'pattern':
                        if (isset($array[$field]) && !preg_match($value, $array[$field])) {
                            return "Поле {$field} заполнено неправильно";
                        }

                        break;

                    case 'mint':
                        if (isset($array[$field]) && ((int)$array[$field]) < (int)$value) {
                            return "Поле {$field} должно быть больше {$value}";
                        }

                        break;
                }
            }
        }

        return true;
    }

    /*
     * Selects all items
     */
    public function all()
    {
        $sql = "SELECT * FROM `{$this->table}`";
        $result = $this->db->query($sql);

        $this->ifNot($result);
        return $result;
    }

    /*
     * Selects three items
     */
    public function three()
    {
        $sql = "SELECT * FROM `{$this->table}` ORDER BY `date` DESC LIMIT 3";
        $result = $this->db->query($sql);

        $this->ifNot($result);
        return $result;
    }

    /*
     * Selects item by id
     */
    public function getById($id)
    {
        $id = intval($id);
        $result = $this->db->query("SELECT * FROM `{$this->table}` WHERE `id` = {$id};");

        $this->ifNot($result);
        return $result[0];
    }

    /*
     * Selects items by status
     */
    public function status($alias)
    {
        if ($alias == 'on') {
            $status = 1;
        } elseif ($alias == 'un') {
            $status = 0;
        }

        $sql = "SELECT * FROM `{$this->table}` WHERE `status` = {$status};";
        $result = $this->db->query($sql);

        $this->ifNot($result);
        return $result;
    }

    /*
     * Deletes item by id
     */
    public function delete($id)
    {
        $sql = "DELETE FROM `{$this->table}` WHERE `id` = {$id};";
        return $this->db->query($sql);
    }

    /*
     * Edits status by id
     */
    public function editStatus($id)
    {
        $orderId = (int)$id[0];
        $statusId = (int)$id[1];

        $sql = "UPDATE `{$this->table}` SET `status` = {$statusId} WHERE `id` = {$orderId};";
        return $this->db->query($sql);
    }

    /*
    * Checks if there is user with certain email & returns his id
    */
    public function checkUser($data)
    {
        $sql = "SELECT `id` FROM `{$this->table}` 
                  WHERE `email` = '{$data['email']}';
        ";

        if ($result = $this->db->query($sql)) {
            return $result[0];
        }

        return false;
    }

    /*
    * Checks if there is user with certain email & returns his id
    */
    protected function ifNot($result)
    {
        if (!$result) {
            return array();
        }
    }
}