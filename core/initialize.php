<?php 

defined('DS') ? null:define('DS',DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null:define('SITE_ROOT',DS.'xampp'.DS.'htdocs'.DS.'PHPRESTEMS');

//xampp/www/PHPREST/includes

defined('INC_PATH') ? null : define('INC_PATH',SITE_ROOT.DS.'includes');
defined('CORE_PATH') ? null : define('CORE_PATH',SITE_ROOT.DS.'core');


//load the config file first

require_once(INC_PATH.DS."config.php");

//core classes

require_once(CORE_PATH.DS."employee.php");
require_once(CORE_PATH.DS."project.php");
require_once(CORE_PATH.DS."emp_proj.php");