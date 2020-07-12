<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/dnvmaster/core');
define("LIBS", ROOT . '/vendor/dnvmaster/core/libs');
define("CACHE", ROOT . '/temp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'default');
$app = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app = preg_replace("#[^/]+$#", '', $app);
$app = str_replace('/public/', '', $app);
define("PATH", $app);
define("ADMIN", PATH . '/admin');
require_once ROOT . '/vendor/autoload.php';
