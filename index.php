<?php

// Автоподключение классов
if (function_exists('__autoload')) {
    spl_autoload_register('__autoload');
}

function __autoload($class) {
    include_once str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
};

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
if (is_numeric($uriParts[1]) && is_numeric($uriParts[2])) {
    $controller = new controller\Error404Controller();
    $controller->indexAction();
    $controller->render();
}

$id = '';

// Определяем ID'шник сущности
if (isset($uriParts[1]) && $uriParts[1] !== '' && is_numeric($uriParts[1])) $id = $uriParts[1];
if (isset($uriParts[2]) && $uriParts[2] !== '' && is_numeric($uriParts[2])) $id = $uriParts[2];

$controller = new $controller();

// Формируем полное название Action'a
$action = sprintf('%sAction', $action);

$controller->$action();
$controller->render();