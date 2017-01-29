<?php

namespace Common;


interface ICache
{
    public static function createCache($parameters);

    public static function readCache($parameters);

    public static function deleteCache();
}