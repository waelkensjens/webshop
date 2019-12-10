<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', DS . 'wamp64' . DS . 'www' . DS . 'Webshop');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT. DS .'admin'. DS .'includes');
defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_ROOT . DS .'admin'. DS .'assets' .DS. 'images');
defined('VENDOR_PATH') ? null : define('VENDOR_PATH', SITE_ROOT . DS . 'vendor');





/*php pagina's*/
require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."config.php");
require_once (VENDOR_PATH.DS."autoload.php");
/*objecten*/
require_once(INCLUDES_PATH.DS."Database.php");
require_once (INCLUDES_PATH.DS."Db_object.php");
require_once(INCLUDES_PATH.DS."User.php");
require_once (INCLUDES_PATH.DS."Role.php");
require_once (INCLUDES_PATH.DS."Product.php");
require_once (INCLUDES_PATH.DS."Session.php");
require_once (INCLUDES_PATH.DS."Comment.php");
require_once (INCLUDES_PATH.DS."Paginate.php");





?>