<?php

namespace controller;

use core\DB;
use core\Helper;
use core\Validator;
use models\ProductModel;

class ProductsController extends BaseController
{

    private $responseReport = [
        'success' => 'Ваше объявление успешно добавлено! Оно будет опубликовано в течение 12 часов после проверки администратором',
        'error' => 'Возникла ошибка. Повторите запрос заново'
    ];

    // Получаем и выводим все карточки товара
    public function indexAction()
    {
        $this->title = 'Последние добавленные товары';

        $db = DB::connect();
        $db->exec("set names utf8");

        $productsInfo = new ProductModel($db);
        $products = $productsInfo->getAllItems();

        $this->content = $this->templateBuild(__DIR__ . '/../view/tpl_parts/cards-out.html.php', ['products' => $products]);
    }

    // Функция публикации объявления
    public function addProductAction()
    {
        $data = $_POST;

        $db = DB::connect();
        $db->exec("set names utf8");

        if (!empty($_FILES)) {
            // Обрабатываем медиа-файлы
            // Назначаем директорию хранения медиа-файлов
            $uploadDir = '/var/www/fleaphp.local/source/uploads/';
            // Формируем имя файла с mime-type
            $uploadFileName = basename($_FILES['form__file']['tmp_name']) . '.' . basename($_FILES['form__file']['type']);
            // Формируем полный путь до файла
            $uploadFile = $uploadDir . basename($_FILES['form__file']['tmp_name']) . '.' . basename($_FILES['form__file']['type']);
            // Перемещаем файл в директорию хранения медиа-файлов
            move_uploaded_file($_FILES['form__file']['tmp_name'], $uploadFile);
            // Получаем путь до файла для бд, от корня
            $data['form_photo'] = "/source/uploads/" . $uploadFileName;
        }

        // Валидируем данные формы
        if (Validator::checkForm($data) !== true) {
            $report = Validator::checkForm($data);

            return $response = Helper::getResponse($this->report['error']);
        } else {
            $products = new ProductModel($db);
            $products->addProduct($data);

            return $response = Helper::getResponse($this->responseReport['success']);
        }
    }

    //  Функция получения и вывода карточки товара
    public function itemAction($itemID)
    {
        $db = DB::connect();
        $db->exec("set names utf8");

        $products = new ProductModel($db);
        $card = $products->getItemByID($itemID);

        $this->content = $this->templateBuild(__DIR__ . '/../view/tpl_parts/card.html.php', ['card' => $card]);
    }
}