<?php
use reiatsu\View;
/** @var $this View */

?>
    <main>
        <div class="container-wrapper">    
          <?= $this->getPart("/parts/images_loop",compact("images")); ?>
          <div class="buttons">
            <form action="/" method="post">
                <button class="secondary-btn">Upload next</button>
            </form>
        </div>
        </div>
    </main>
</body>
</html>