<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW",ROOT."/public");
define("APP",ROOT."/app");
define("CORE",ROOT."/vendor/wfm");
define("HELPERS",ROOT."/vendor/reiatsu/helpers");
define("CACHE",ROOT."/tmp/cache");
define("LOGS",ROOT."/tmp/logs");
define("CONFIG",ROOT."/config");
define("LAYOUT", "oled");
define("PATH","http://localhost:1237");
define("NO_IMAGE","uploads/no_image.jpg");
define("SRC",PATH."/src");
define("UPLOAD",WWW."/src/uploads");
define("BITMAPS",WWW."/src/bitmaps");
define("ABS_PATH_UPLOADS","/root/php/docker-compose-lamp/www/public/src/uploads");
define("ABS_PATH_BITMAPS","/root/php/docker-compose-lamp/www/public/src/bitmaps");
define("ABS_PATH_CARRAY","/root/php/docker-compose-lamp/www/public/src/c_arrays");

require_once ROOT."/vendor/autoload.php";