<?php

use reiatsu\View;
/** @var $this View */

?>
<?php $this->getPart('parts/header'); ?>
<?php 
    if(isset($_SESSION['error'])){
        echo '<div>'.$_SESSION['error'].'</div>';
        unset($_SESSION['error']);
    }
?>
<?php echo $this->content ?>