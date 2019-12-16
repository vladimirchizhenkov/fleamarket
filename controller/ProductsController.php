<?php

namespace controller;

use core\DB;
use core\Helper;
use core\Validator;
use models\ProductModel;

class ProductsController extends BaseController
{
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

        //  Обрабатываем данные для сохранения фотографии из формы быстрых объявлений
        $uploadDir = '/var/www/fleaphp.local/source/uploads/';
        $uploadFileName  = basename($_FILES['form__file']['tmp_name']) . '.' . basename($_FILES['form__file']['type']);
        $uploadFile      = $uploadDir . basename($_FILES['form__file']['tmp_name']) . '.' . basename($_FILES['form__file']['type']);
        move_uploaded_file($_FILES['form__file']['tmp_name'], $uploadFile);

        $data['form_photo'] = "/source/uploads/" . $uploadFileName;

        // Если валидация не пройдена
        if (Validator::checkForm($data) !== true) {
             $report = Validator::checkForm($data);
             return $response = Helper::getResponse($report);
        // Если валидация успешно пройдена
        } else {
            $mFtrade = new FastProductModel($db);
            $mFtrade->addFastProduct($data);

            $report = 'Ваше объявление успешно добавлено! Оно будет опубликовано в течение 12 часов после проверки администратором';

            return $response = Helper::getResponse($report);
        }
    }

    public function itemAction($itemID)
    {
        $db = DB::connect();
        $db->exec("set names utf8");

        $thisModel = new ProductModel($db);
        $card = $thisModel->getItemByID($itemID);

        $this->content = $this->templateBuild(__DIR__ . '/../view/tpl_parts/card.html.php', ['card' => $card]);
    }
}