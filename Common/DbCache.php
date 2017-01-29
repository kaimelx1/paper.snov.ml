<?php

namespace Common;


class DbCache implements ICache
{

    /*
     * Creates file db cash
     */
    public static function createCache($data)
    {
       return $data[0]->query("INSERT INTO `print_items_cache` SET `source` = '$data[1]', `content` = '$data[2]'");
    }

    /*
     * Reads db cash
     */
    public static function readCache($data)
    {
        return $result = $data[0]->query("SELECT `content` FROM `print_items_cache` WHERE `source` =  '$data[1]'");
    }

    /*
     * Deletes db cash
     */
    public static function deleteCache()
    {

    }
}