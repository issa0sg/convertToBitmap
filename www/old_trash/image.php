<?php

require_once 'utils.php';

class Image{

    public $image_obj;

    function __construct($image_obj)
    {
        $this->image_obj = $image_obj;
    }

    function upload($path,$name_file = ''){
        $name = $name_file.get_random_name().".jpg";
        $target_file = "{$path}/{$name}";
        move_uploaded_file($this->image_obj['tmp_name'], $target_file);
        return $name;
    }

}
?>