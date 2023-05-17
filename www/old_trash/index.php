<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="background"></div>
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <button type="submit">Submit</button>
        </form>
        <br>
        <a href="upload_background.php" class="upload-bg-button">Upload Background Image</a>
    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>