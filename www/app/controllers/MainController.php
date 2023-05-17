<?php

namespace app\controllers;

use reiatsu\Controller;

class MainController extends Controller
{
    public function indexAction()
    {

        $this->setMeta("OLED","Main Page","Main");
    }
}