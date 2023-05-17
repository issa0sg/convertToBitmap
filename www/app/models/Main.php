<?php

namespace app\models;

use reiatsu\Model;
use RedBeanPHP\R;

class Main extends Model{

    public function get_Test(){
        return R::getAll("SELECT * FROM test");
    }

}