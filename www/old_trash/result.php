<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Uploaded Image</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="background"></div>
    <div class="container">
        <?php
        if (isset($_SESSION['bitmap_image'])) {
            $uploaded_image = $_SESSION['bitmap_image'];
            echo "<h2>Uploaded Image:</h2>";
            echo "<img src='uploads/{$uploaded_image}' alt='Uploaded Image' style='max-width: 300px; max-height: 300px;'>";
            unset($_SESSION['bitmap_image']);
        } else {
            echo "<p>No image was uploaded.</p>";
        }
        ?>
        <br>
        <a href="index.php" class="back-button">Back</a>
    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>