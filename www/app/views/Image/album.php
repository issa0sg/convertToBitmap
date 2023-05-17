<?php
use reiatsu\View;
/** @var $this View */
?>
    <main>
      <div class="container-wrapper">

        <?= $this->getPart("/parts/images_loop",compact("images")); ?>
      
      </div>
    </main>
</body>
</html>