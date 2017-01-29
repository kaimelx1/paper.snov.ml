<?php

namespace Common;


class Convert
{
    /*
     * Converts data to XML format
     */
    public static function to_xml($data, &$xml_data)
    {
        foreach ($data as $key => $value) {

            if (is_numeric($key)) {
                $key++;
                $key = 'item-' . $key; //dealing with <0/>..<n/> issues
            }

            if (is_array($value)) {
                $subnode = $xml_data->addChild($key);
                self::to_xml($value, $subnode);

            } else {
                $xml_data->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

    /*
     * Shows image
     */
    public static function image($id)
    {
        if (file_exists('webroot/images/items/' . $id . '.jpg')) {
            echo '/webroot/images/items/' . $id . '.jpg';
        } else {
            echo '/webroot/images/items/0.jpg';
        }
    }
}