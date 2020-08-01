<?php

namespace app\controllers;

use app\Models\AppModel;
use app\Widjets\currency\Currency;
use dnvmaster\App;
use dnvmaster\base\Controller;
use dnvmaster\Cache;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('currencies', Currency::getCurrencies());
        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));
        App::$app->setProperty('cats', self::cacheCategory());
    }

    public static function cacheCategory()
    {
        $cache =Cache::instance();
        $cats = $cache->get('cats');
        if (!$cats)
        {
            $cats = \R::getAssoc("SELECT * FROM category");
            $cache->set('cats', $cats);
        }
        return $cats;
    }
}