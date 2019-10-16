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

    public function addNewFastProduct() {
        $db = DB::connect();
        $db->exec("set names utf8");

        $mFtrade = new FastProductModel($db);
        $addFastProduct = $mFtrade->addNewItem();

        return $addFastProduct;
    }

}