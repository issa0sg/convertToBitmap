<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Background</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="background">;"></div>
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="hidden" name="is_background">
            <button type="submit">Upload Background</button>
        </form>
        <a href="index.php" class="back-button">Back</a>
    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>