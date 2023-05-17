<?php
require_once 'utils.php';

function update_image_list($path) {
    $images = glob($path . "/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
    $image_names = array_map('basename', $images);
    header('Content-Type: application/json');
    echo json_encode($image_names);
}

$path = "assets/images/backgrounds";
update_image_list($path);
?>
