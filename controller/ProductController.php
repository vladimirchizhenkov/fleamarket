<?php

namespace controller;

use core\DB;
use core\Helper;
use core\Validator;
use model\ProductModel;

class ProductController extends BaseController
{
    // Получаем и выводим все карточки товара
    public function indexAction()
    {
        $this->title = 'Последние добавленные товары';

        $db = DB::connect();
        $db->exec("set names utf8");

        $productsInfo = new ProductModel($db);
        $products = $productsInfo->getAllProducts();

        $this->content = $this->templateBuild(__DIR__ . '/../view/tpl_parts/cards-out.html.php', ['products' => $products]);
    }

    // Функция публикации объявления
    public function newProductAction() : bool
    {
        $data = $_POST;

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
        if (!Validator::checkForm($data)) {
            $report = Validator::checkForm($data);

            return $response = Helper::getResponse($this->report['error']);
        }

        $db = DB::connect();
        $db->exec("set names utf8");

        $products = new ProductModel($db);

        if ($products->addProduct($data)) return Helper::getResponse($this->responseReport['success']);

        return false; // Должен быть жсон ответ с ошибкой
    }

    //  Функция получения и вывода карточки товара
    public function getItemAction()
    {
        $db = DB::connect();
        $db->exec("set names utf8");

        // Получаем ID продукта
        $itemID = $this->request->get('id');

        $products = new ProductModel($db);
        $card = $products->getProductByID($itemID);

        if ($card) {
            return $this->content = $this->templateBuild(__DIR__ . '/../view/tpl_parts/card.html.php', ['card' => $card]);
        }

        return false; // Шаблон 404;
    }

    public function deleteProductAction($itemID) : bool
    {
        $db = DB::connect();
        $db->exec("set names utf8");

        $product = new ProductModel($db);

        if ($product->deleteProduct($itemID)) return Helper::getResponse($this->responseReport['deleteSuccess']);

        return false; // Должен быть жсон ответ с ошибкой
    }
}