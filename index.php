<?php

include_once 'core/DB.php';
//include_once 'core/Templater.php'; - используется в BaseController;
include_once 'model/BaseModel.php';
include_once 'model/FastProductModel.php';
include_once 'controller/BaseController.php';
include_once 'controller/ProductsController.php';

use core\DB;
use core\Templater;
use models\BaseModel;
use models\FastProductModel;
use controller\BaseController;
use controller\CardController;

function __autoload($classname) {
    include_once __DIR__ . DIRECTORY_SEPARATOR .  str_replace('\\', DIRECTORY_SEPARATOR, $classname) . 'php';
}

$uri = $_SERVER['REQUEST_URI'];
$uriParts = explode('/', $uri);
unset($uriParts[0]);
$uriParts = array_values($uriParts);

$controller = isset($uriParts[0]) && $uriParts[0] !== '' ? $uriParts[0] : 'products';

switch ($controller) {
    case 'products':
        $controller = sprintf('controller\%sController', 'Products');
        break;
    case 'user':
        $controller = sprintf('controller\%sController', 'User');
        break;

    default:
        die('error 404');
        break;
}

$action = isset($uriParts[1]) && $uriParts[1] !== '' && is_string($uriParts) ? $uriParts[1] : 'index';
$action = sprintf('%sAction', $action);

# получить id новости, карточки и т.п.

$controller = new $controller();
$controller->$action();
$controller->render();