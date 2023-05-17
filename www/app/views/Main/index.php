<?php
?>
    <main>
        <div class="container-select">
            <form action="image/upload" method="post" enctype="multipart/form-data">
                <div class="file-selection">
                    <label for="file-upload" class="main-select__button">Select file</label>
                    <input type="file" name="uploaded_file" id="file-upload" hidden>
                </div>
                <div class="upload-action">
                    <input type="submit" value="Upload" class="secondary-btn">
                </div>
            </form>
        </div>
    </main>
</body>
</html>