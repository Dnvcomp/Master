<?php

namespace app\controllers;

use dnvmaster\App;
use dnvmaster\Cache;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta(App::$app->getProperty('dnvmaster_name'),'Сервис DnvMaster, доступен каждому. В нём можно заказать услуги по ремонту, электрики, сборки мебели, сантехники и хозяйству в вашем доме или квартире. В течение двух часов мастер приедет к Вам и выполнит заказ качественно и в срок, по приемлемой цене.', 'DnvMaster, Сервис, Заказ, Цена, Качество, Электрика, Сантехника, Мебель, Услуги');
        $sliders = \R::find('slider','LIMIT 3');
        $brands = \R::find('brand', 'LIMIT 3');
        $hits = \R::find('product', "hit = '1' AND status = '1' LIMIT 8");
        $this->set(compact('brands', 'sliders', 'hits'));
    }
}