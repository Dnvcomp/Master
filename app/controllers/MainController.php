<?php

namespace app\controllers;

use dnvmaster\App;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta(App::$app->getProperty('dnvmaster_name'),'Сервис DnvMaster, доступен каждому. В нём можно заказать услуги по ремонту, электрики, сборки мебели, сантехники и хозяйству в вашем доме или квартире. В течение двух часов мастер приедет к Вам и выполнит заказ качественно по приемлемой цене.', 'DnvMaster, Сервис, Заказ, Цена, Качество, Электрика, Сантехника, Мебель, Услуги');
        $name = 'John';
        $age = 30;
        $names = ['Andrei','Mikolai'];
        $this->set(compact('name','age', 'names'));
    }
}