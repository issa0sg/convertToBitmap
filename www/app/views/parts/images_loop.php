<?php

/**
 * @var $images array
 */
?>
<?php 
foreach ($images as $key => $image):?>
    <div class="container">
        <div class="images">
            <img src="<?= SRC.'/uploads/'.$image['original_image']?>" alt="Image 1" class="image">
            <img src="<?= SRC.'/bitmaps/'.$image['bitmap_image']?>" alt="Image 2" class="image">
        </div>
    </div>
    <div class="buttons">
        <button class="downloadBtn main-btn" data-file="<?= $image['c_array'] ?>">Download</button>
    </div>
<?php endforeach; ?>

<script src="<?= SRC?>/assets/js/download.js"></script>