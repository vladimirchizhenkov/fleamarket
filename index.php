<?php

use core\Request;

// Автоподключение классов
if (function_exists('__autoload')) {
    spl_autoload_register('__autoload');
}

function __autoload($class) {
    include_once str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
};

session_start();

// Разбиваем входящий URI на части, вытаскиваем данные для формирования контроллера
$uri = $_SERVER['REQUEST_URI'];
$uriParts = explode('/', $uri);
unset($uriParts[0]);
$uriParts = array_values($uriParts);

// Получаем имя контроллера
$controller = isset($uriParts[0]) && $uriParts[0] !== '' ? $uriParts[0] : 'product';

// Формируем полный путь до контроллера
switch ($controller) {
    case 'product';
        $controller = sprintf('controller\%sController', 'Product');
        break;
    default:
        $controller = sprintf('controller\%sController', 'Error404');
        break;
}

// Определяем какой Action контроллера подключается
$action = isset($uriParts[1]) && $uriParts[1] !== '' ? $uriParts[1] : 'index';

// Если 2й и 3й элементы являются числами, то выкидываем 404
if (is_numeric($uriParts[1]) && is_numeric($uriParts[2]) || count($uriParts) > 3) {
    $controller = new controller\Error404Controller();
    $controller->indexAction();
    $controller->render();
}

// Назначаем пустой ID сущности
$itemID = '';

// Определяем ID сущности
if (isset($uriParts[1]) && $uriParts[1] !== '' && is_numeric($uriParts[1])) $itemID = $uriParts[1];
if (isset($uriParts[2]) && $uriParts[2] !== '' && is_numeric($uriParts[2])) $itemID = $uriParts[2];

if (isset($itemID) && is_numeric($itemID)) $_GET['id'] = $itemID;

// Определяем Action;
if (is_numeric($uriParts[1])) {
    $action = 'getItemAction';
}
else {
    $action = sprintf('%sAction', $action);
}

$request = new Request($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE, $_SESSION);

$controller = new $controller($request);

$controller->$action();
$controller->render();