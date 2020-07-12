<?php
require_once dirname(__DIR__).'/config/init.php';
require_once LIBS . '/functions.php';
new \dnvmaster\App();
debug(\dnvmaster\App::$app->getProperties());
