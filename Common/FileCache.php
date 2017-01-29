<?php

namespace Common;


class FileCache implements ICache
{
    /*
     * Creates file cash
     */
    public static function createCache($data)
    {
        $fileRoot = SITE_DIR . DS . 'cache' . DS . $data[1] . '.cache';
        $data = serialize($data[0]);
        file_put_contents($fileRoot, $data);
    }

    /*
     * Reads file cash
     */
    public static function readCache($file)
    {
        $fileRoot = SITE_DIR . DS . 'cache' . DS . $file[0] . '.cache';

        if (file_exists($fileRoot) && $file[0] = file_get_contents($fileRoot)) {
            return unserialize($file[0]);
        }

        return null;
    }

    /*
     * Deletes item's cache files
     */
    public static function deleteCache()
    {
        foreach (glob("cache/*.cache") as $filename) {
            unlink($filename);
        }
    }
}