<?php

include_once 'core/DB.php';
include_once 'core/Helper.php';
include_once 'core/Validator.php';
//include_once 'core/Templater.php'; - используется в BaseController;
include_once 'model/BaseModel.php';
include_once 'model/FastProductModel.php';
include_once 'controller/BaseController.php';
include_once 'controller/ProductsController.php';

use core\DB;
use core\Helper;
use core\Templater;
use models\BaseModel;
use models\FastProductModel;
use controller\BaseController;

function __autoload($class) {
    include_once __DIR__ . DIRECTORY_SEPARATOR .  str_replace('\\', DIRECTORY_SEPARATOR, $class) . 'php';
}

$uri = $_SERVER['REQUEST_URI'];
$uriParts = explode('/', $uri);
unset($uriParts[0]);
$uriParts = array_values($uriParts);

$controller = isset($uriParts[0]) && $uriParts[0] !== '' ? $uriParts[0] : 'products';

switch ($controller) {
    case 'product' || 'products' || 'addFastProduct':
        $controller = sprintf('controller\%sController', 'Products');
        break;
    default:
        die('error 404');
        break;
}

$action = isset($uriParts[1]) && $uriParts[1] !== '' ? $uriParts[1] : 'index';

$controller = new $controller();

if (is_numeric($action)) {
    $itemId = $uriParts[1];
    $action = 'itemAction';
    $controller->$action($itemId);
}

else {
    $action = sprintf('%sAction', $action);
    $controller->$action();
}

$controller->render();