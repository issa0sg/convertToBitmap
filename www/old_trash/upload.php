<?php
session_start();
require_once 'image.php';

if (isset($_FILES['image'])) {
    $obj = new Image($_FILES['image']);
    // Check if the uploaded file is a background image
    if (isset($_POST['is_background'])) {
        
        $obj->upload("assets/images/backgrounds","background");


        header("Location: index.php");
    } else {
        $file_path = $obj->image_obj['tmp_name'];
        $mimetype = mime_content_type($file_path);
        $filename = basename($file_path);

        $api_url = "http://192.168.32.129:5000/api/convert_to_bitmap";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $post_data = array('file' => curl_file_create($file_path, $mimetype, $filename));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        $response = curl_exec($ch);
        error_log("Flask API response: " . $response);

        $json_response = json_decode($response, true);
        if ($json_response !== null && isset($json_response['bitmap_image'])) {
            $bitmap_filename = $json_response['bitmap_image'];
            $_SESSION['bitmap_image'] = $bitmap_filename;
            header("Location: result.php");
        } else {
            // Handle the error case
            if ($json_response !== null && isset($json_response['error'])) {
                echo "Error processing image: " . $json_response['error'];
            } else {
                echo "Error processing image. Please try again.";
            }
        }
    }
}
?>