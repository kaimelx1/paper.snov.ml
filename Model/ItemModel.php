<?php

namespace Model;

use Common\Convert;
use Common\FileCache;
use Common\DbCache;

class ItemModel extends BaseModel
{
    protected $table = 'print_items';

    protected $validations = array(
        'title' => array(
            'min' => 1,
            'max' => 30,
        ),
        'description' => array(
            'min' => 1,
            'max' => 300,
        ),
        'quantity' => array(
            'mint' => 1,
        ),
        'price' => array(
            'mint' => 1,
        ),
    );

    /*
     * Selects items with discount
     */
    public function getDiscount()
    {
        $result = $this->db->query("SELECT * FROM `{$this->table}` WHERE `discount` > 0;");

        $this->ifNot($result);

        return $result;
    }

    /*
     * Selects items by section's id & returns their count
     */
    public function getAllCount($id)
    {
        $result = $this->db->query("SELECT * FROM `{$this->table}` WHERE `section_id` = {$id};");
        return count($result);
    }

    /*
     * Selects items by category & offset using file cash
     */
    public function getAll($id, $page = 1)
    {
        $id = intval($id);
        $page = intval($page);
        $offset = ($page - 1) * PAGINATION;
        $limit = PAGINATION;

        //cash
        $file = "items-{$id}-{$page}";
        if ($result = FileCache::readCache([$file])) {
            return $result;
        }

        $result = $this->db->query("SELECT * FROM `{$this->table}` WHERE `section_id` = {$id} LIMIT {$limit} OFFSET {$offset};");
        $this->ifNot($result);

        //cash
        FileCache::createCache([$result, $file]);

        return $result;
    }

    /*
     * Selects items by several ids
     */
    public function getItemsByIds($ids)
    {
        $result = $this->db->query("SELECT * FROM `{$this->table}` WHERE `id` IN ($ids)");
        $this->ifNot($result);
        return $result;
    }

    /*
     * Inserts new item & returns its id
     */
    public function addItem($data)
    {
        $data['title'] = $this->db->escape($data['title']);
        $data['section'] = $this->db->escape($data['section']);
        $data['price'] = $this->db->escape($data['price']);
        $data['discount'] = $this->db->escape($data['discount']);
        $data['quantity'] = $this->db->escape($data['quantity']);
        $data['description'] = $this->db->escape($data['description']);
        $data['about'] = $this->db->escape($data['about']);
        $data['video'] = $this->db->escape($data['video']);
        //SPECIAL
        $data['title'] = htmlspecialchars($data['title']);
        $data['section'] = htmlspecialchars($data['section']);
        $data['price'] = htmlspecialchars($data['price']);
        $data['discount'] = htmlspecialchars($data['discount']);
        $data['quantity'] = htmlspecialchars($data['quantity']);
        $data['description'] = htmlspecialchars($data['description']);
        $data['about'] = htmlspecialchars($data['about']);
        $data['video'] = htmlspecialchars($data['video']);
        //INT
        $data['section'] = (int)$data['section'];
        $data['price'] = (int)$data['price'];
        $data['discount'] = (int)$data['discount'] / 100;
        $data['quantity'] = (int)$data['quantity'];
        //CHECKBOXES
        if (isset($data['new'])) {
            $data['new'] = 1;
        } else {
            $data['new'] = 0;
        }
        if (isset($data['availability'])) {
            $data['availability'] = 1;
        } else {
            $data['availability'] = 0;
        }

        $sql = "INSERT INTO `{$this->table}`
                    SET `title` = '{$data['title']}',
                        `section_id` = {$data['section']},
                        `price` = {$data['price']},
                        `discount` = {$data['discount']},
                        `quantity` = {$data['quantity']},
                        `description` = '{$data['description']}',
                        `about` = '{$data['about']}',
                        `video` = '{$data['video']}',
                        `is_new` = {$data['new']},
                        `availability` = {$data['availability']};
        ";

        if ($this->db->query($sql)) {
            return $this->db->lastId();
        }

        return false;
    }

    /*
     * Updates item by id
     */
    public function updateItem($data)
    {
        $data['title'] = $this->db->escape($data['title']);
        $data['section'] = $this->db->escape($data['section']);
        $data['price'] = $this->db->escape($data['price']);
        $data['discount'] = $this->db->escape($data['discount']);
        $data['quantity'] = $this->db->escape($data['quantity']);
        $data['description'] = $this->db->escape($data['description']);
        $data['about'] = $this->db->escape($data['about']);
        $data['video'] = $this->db->escape($data['video']);
        //SPECIAL
        $data['title'] = htmlspecialchars($data['title']);
        $data['section'] = htmlspecialchars($data['section']);
        $data['price'] = htmlspecialchars($data['price']);
        $data['discount'] = htmlspecialchars($data['discount']);
        $data['quantity'] = htmlspecialchars($data['quantity']);
        $data['description'] = htmlspecialchars($data['description']);
        $data['about'] = htmlspecialchars($data['about']);
        $data['video'] = htmlspecialchars($data['video']);
        //INT
        $data['section'] = (int)$data['section'];
        $data['price'] = (int)$data['price'];
        $data['discount'] = (int)$data['discount'] / 100;
        $data['quantity'] = (int)$data['quantity'];
        $data['id'] = (int)$data['id'];
        //CHECKBOXES
        if (isset($data['new'])) {
            $data['new'] = 1;
        } else {
            $data['new'] = 0;
        }
        if (isset($data['availability'])) {
            $data['availability'] = 1;
        } else {
            $data['availability'] = 0;
        }

        $sql = "UPDATE `{$this->table}`
                    SET `title` = '{$data['title']}',
                        `section_id` = {$data['section']},
                        `price` = {$data['price']},
                        `discount` = {$data['discount']},
                        `quantity` = {$data['quantity']},
                        `description` = '{$data['description']}',
                        `about` = '{$data['about']}',
                        `video` = '{$data['video']}',
                        `is_new` = {$data['new']},
                        `availability` = {$data['availability']}
                    WHERE `id` = {$data['id']};
        ";


        return $this->db->query($sql);
    }


    /*
     * Returns items in XML format
     */
    public function displayXML()
    {
        $result = $this->all();
        $xml_data = new \SimpleXMLElement('<?xml version="1.0"?><data></data>');
        // function call to convert array to xml
        Convert::to_xml($result, $xml_data);
        //saving generated xml file;
        return $xml_data->asXML();
    }

    /*
     * Returns items in JSON format
     */
    public function displayJSON()
    {
        $result = $this->all();
        return json_encode($result, JSON_PRETTY_PRINT);
    }

    /*
     * Returns partner's items as array
     */
    public function getFromPartner()
    {
        $items = array();
        $url = 'http://www.bbk.ru/upload/xml/tv_video/dvd_theatres.xml';
        $shop = $this->getXML($url);

        foreach ($shop->section->items->item_block as $offer) {
            $items[] = array(
                'title' => $offer->name,
                'description' => htmlspecialchars($offer->text),
                'price' => number_format(rand(100, 300), 2),
                'image' => urldecode($offer->img),
                'id' => $offer->id,
            );
        }

        return $items;
    }

    /*
     * Makes curl query & returns data as XML object using db cash
     */
    private function getXML($url)
    {
        if ($result = DbCache::readCache([$this->db, $url])) {
            return $object = new \SimpleXMLElement($result[0]['content']);
        } else {

            //  Initiate curl
            $ch = curl_init();
            // Disable SSL verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // Will return the response, if false it print the response
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Set the url
            curl_setopt($ch, CURLOPT_URL, $url);
            // Execute
            $result = curl_exec($ch);
            // Closing
            curl_close($ch);

            DbCache::createCache([$this->db, $url, $result]);

            return new \SimpleXMLElement($result);
        }
    }

    /*
     * Makes curl query & returns data in JSON format
     */
    private function getJSON($url)
    {
        //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);
        // Execute
        $result = curl_exec($ch);
        // Closing
        curl_close($ch);

        $object = json_decode($result, true);
        return ($object);
    }
}