<?php

namespace dnvmaster;

class Db
{
    use Tsingletone;
    protected function __construct()
    {
        $db = require_once CONF . 'config_db.php';
    }
}