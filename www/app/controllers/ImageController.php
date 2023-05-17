<?php

namespace app\controllers;

use Exception;
use reiatsu\Controller;

class ImageController extends Controller
{
    private static function validateFormat($file)
    {
        $imageTypes = ['image/jpeg', 'image/png'];
        $fileType = $file['type'];
        $extension = '';
        if (!in_array($fileType, $imageTypes)) {
            $_SESSION['error'] = "Не подходящий формат(";
            redirect("/");
        }
        switch ($fileType) {
            case 'image/jpeg':
                $extension = '.jpg';
                break;
            case 'image/png':
                $extension = '.png';
                break;
            default:
                break;
        }
        return $extension;
    }

    public function uploadAction()
    {
        if(!isset($_FILES['uploaded_file'])){
            redirect("/");
        }
        $file = $_FILES['uploaded_file'];

        $extension = ImageController::validateFormat($file);

        $randomName = substr(bin2hex(random_bytes(3)), 0, 6) . $extension;
        $destinationPath = UPLOAD . '/'.$randomName;

        if (move_uploaded_file($file['tmp_name'], $destinationPath)) {   
            
            // The URL of the Flask API
            $api_url = 'http://192.168.32.133:5000/bitmap/convert';
            // The required parameters for the POST request
            $post_data = [
                'file_location' => ABS_PATH_UPLOADS.'/'.$randomName,
                'bitmap_location' => ABS_PATH_BITMAPS,
                'c_array_location' => ABS_PATH_CARRAY
            ];
            
            // var_dump("passed");die;
            // Initialize a new cURL session
            $ch = curl_init($api_url);

            // Set cURL options
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Execute the cURL session and get the response
            $response = curl_exec($ch);
            // var_dump($response);die;

            // Close the cURL session
            curl_close($ch);

            // Decode the JSON response
            $response_data = json_decode($response, true);
            // Check if the 'output_image_path' key exists in the response data
            if (isset($response_data['name_file'])) {
                // Save the output_image_path
                $output_image_path = $response_data['name_file'] . '.jpg';
                $output_array_path = SRC.'/c_arrays/'.$response_data['name_file'];
                // echo "Output Image Path: " . $output_image_path;
            } else {
                $_SESSION['error'] = "По какой то но неизвестной причине API на FLASK не вернул name_file";
                redirect('/');
                // echo "Error: Could not retrieve output_image_path.";
            }
            
            $db_data = [
                'id' => 0,
                'original_image' => $randomName,
                'bitmap_image' => $output_image_path,
                'c_array' => $output_array_path
            ];
            if($db_data['id'] = $this->model->saveImage($db_data)){
                redirect("show?id={$db_data['id']}");
            } else {
                throw new Exception("По неизвестной причине не удалось получить ID",404);
            }
        } else {
            throw new Exception("Не удалось загрузить!",404);
        }
        
    }
    
    public function albumAction()
    {
        $images = $this->model->getImages();
        $this->setMeta("Album","Все фотки тут","Albums,results");
        // var_dump($this->layout);
        // var_dump($images);die;
        $this->set(compact('images'));
    }
    
    public function showAction()
    {
        $images = $this->model->getImage($_GET['id']);
        // var_dump($image);die;
        $this->set(compact('images'));
        // $this->set($image);
        // var_dump($this->getData());die;
        $this->setMeta("Result","Result page","result");
    }

}