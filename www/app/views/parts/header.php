<?php

use reiatsu\View;
/** @var $this View */

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <base href="<?= base_url() ?>">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= SRC?>/assets/css/main.css">
  <?= $this->getMeta() ?>
</head>
<body>
  <header>
      <nav>
            <ul class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="image/album">Album</a></li>
            </ul>
      </nav>
  </header>