<?php

namespace app\controllers;

use app\Models\AppModel;
use dnvmaster\base\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
    }
}