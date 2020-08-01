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
    protected $class = 'menu';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'dnvmaster_menu';
    protected  $attributes = [];
    protected $prepend = '';

    public function __construct($options = [])
    {
       $this->template = __DIR__ . 'menu_template/menu.php';
       $this->getOptions($options);
       $this->run();
    }

    protected function getOptions($options)
    {
        foreach($options as $k => $v) {
            if(property_exists($this, $k)) {
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
            if(!$this->data) {
                $this->data = $cats = \R::getAssoc("SELECT * FROM {$this->table}");
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if ($this->cache) {
                $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
            }
        }
        $this->output();
    }

    protected function output()
    {
        $attributes = '';
        if(!empty($this->attributes)) {
            foreach($this->attributes as $k => $v) {
                $attributes .= " $k ='$v' ";
            }
        }
        echo "<{$this->container} class='{$this->class}' $attributes>";
            echo $this->prepend;
            echo $this->menuHtml;
        echo "</{$this->container}>";

    }

    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node)
        {
            if (!$node['parent_id'])
            {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category)
        {
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->template;
        return ob_get_clean();
    }
}