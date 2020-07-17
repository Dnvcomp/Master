<?php

namespace app\controllers;

use dnvmaster\App;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta(App::$app->getProperty('dnvmaster_name'),'Опсание странцы', 'Ключевые слова');
    }
}