<?php

namespace app\widjets\menu;

use dnvmaster\App;
use dnvmaster\Cache;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $template;
    protected $container = 'ul';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'dnvmaster_menu';
    protected  $attributes = [];
    protected $prepend = '';

    public function __construct($options = [])
    {
       $this->template = __DIR__ . '/menu_template/menu.php';
       $this->getOptions($options);
       debug($this->table);
       $this->run();
    }

    protected function getOptions($options)
    {
        foreach ($options as $k => $v)
        {
            if (property_exists($this, $k))
            {
                $this->$k = $v;
            }
        }
    }

    protected function run()
    {
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if (!$this->menuHtml) {
            $this->data = App::$app->getProperty('cats');
            if (!$this->data)
            {
                $this->data = $cats = \R::getAssoc("SELECT * FROM {$this->table}");
            }
        }
        $this->output();
    }

    protected function output()
    {
        echo $this->menuHtml;
    }

    protected function getTree()
    {
        //
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        //
    }

    protected function catToTemplate($category, $tab, $id)
    {
        //
    }
}