<?php
require_once dirname(__DIR__) . '/Config/init.php';
require_once LIBS . '/functions.php';
new \dnvmaster\App();
//debug(\dnvmaster\App::$app->getProperties());
throw new Exception('Страница не найдена', 500);
