<?php

namespace app\models;

use reiatsu\Model;
use RedBeanPHP\R;

class Image extends Model{


    public function getImage($data)
    {
        return R::getAll("SELECT * FROM images WHERE id = ?", [$data]);
    }

    public function getImages()
    {
        return R::getAll("SELECT * FROM images");
    }

    public function saveImage($data): int|false
    {
        R::begin();
        try {
            
            $image = R::dispense('images');
            $image->original_image = $data['original_image'];
            $image->bitmap_image = $data['bitmap_image'];
            $image->c_array = $data['c_array']; 
            
            $image_id = R::store($image);
            
            R::commit();
            return $image_id;

        } catch (\Exception $th) {
            R::rollback();
            return false;
        }
    }


}