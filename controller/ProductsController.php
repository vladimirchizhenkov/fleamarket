<?php

namespace controller;

use core\DB;
use models\FastProductModel;

class ProductsController extends BaseController
{
    public function indexAction()
    {
        $this->title = 'Последние добавленные товары';

        $db = DB::connect();
        $db->exec("set names utf8");

        $mFtrade = new FastProductModel($db);
        $mFProducts = $mFtrade->getAllItems();

        $this->content = $this->templateBuild(__DIR__ . '/../view/tpl_parts/cards-out.html.php', ['mFProducts' => $mFProducts]);
    }

    public function addFastProductAction()
    {

        $db = DB::connect();
        $db->exec("set names utf8");

        $uploadDir       = '/var/www/fleaphp.local/source/uploads/';
        $uploadFileName  = basename($_FILES['form__file']['tmp_name']) . '.' . basename($_FILES['form__file']['type']);
        $uploadFile      = $uploadDir . basename($_FILES['form__file']['tmp_name']) . '.' . basename($_FILES['form__file']['type']);
        move_uploaded_file($_FILES['form__file']['tmp_name'], $uploadFile);

        $data               = $_POST;
        $data['form_photo'] = "/source/uploads/" . $uploadFileName;
        $f_data             = $_FILES;

        $mFtrade = new FastProductModel($db);
        $mFtrade->addFastProduct($data);

        header('Location: /');
    }

}