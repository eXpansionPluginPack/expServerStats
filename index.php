<?php

define('OWEB_DIR_MAIN', 'vendor/oliverde8/oweb-framework/OWeb/');
define('OWEB_CONFIG', 'config.ini');

define('OWEB_DEFAULT_PAGE', 'home');
define('OWEB_DIR_PAGES', "pages");
define('OWEB_DIR_FAPI', "fapi");

define('OWEB_HTML_DIR_CSS', 'css/');
define('OWEB_HTML_DIR_JS', 'js/');
define('OWEB_DIR_DATA', 'var/');
define('OWEB_WWW_DATA', 'var/');
define('OWEB_HTML_URL_IMG', 'img/');

//This is to fix a bug that needs to be fixed in OWeb
define('OWEB_DIR_VIEWS', 'src/views');


require_once 'vendor/oliverde8/oweb-framework/OWeb/OWeb.php';
require_once 'classes/tmfcolorparser.inc.php';
require_once 'classes/utils.php';

$loader = require 'vendor/autoload.php';
//$loader->add('OWebExt', 'OWebExt/');


if (!isset($_SERVER['REMOTE_ADDR']))
    $_SERVER['REMOTE_ADDR'] = "";

$Oweb = new OWeb\OWeb($_GET, $_POST, $_FILES, $_COOKIE, $_SERVER, $_SERVER['REMOTE_ADDR']);

$Oweb->registerNameSpace('Controller', 'src/controllers');
$Oweb->registerNameSpace('View', 'src/views');
$Oweb->registerNameSpace('Model', 'src/models');
$Oweb->registerNameSpace('Extension', 'src/extensions');
$Oweb->registerNameSpace('Page', 'src/pages');
$Oweb->init();

$Oweb->display();
?>
