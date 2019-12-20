<?php
/**
 * Created by PhpStorm.
 * User: IdeaFix
 * Date: 16.09.2019
 * Time: 22:47
 */

namespace models;

use core\DB;

class ProductModel extends BaseModel
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db, 'product');
    }

    // Функция добавления товаров
    public function addProduct($data)
    {
        #extract($data); --- возможно будет более лаконично с этой функцией;

        // Добавляем в таблицу USERS
        $form_name        = $data['form_name'];
        $form_tel         = $data['form_tel'];
        $form_city        = $data['form_city'];

        //
        $form_product     = $data['form_product'];
        $form_price       = (int)$data['form_price'];
        $form_description = $data['form_description'];
        $form_photo       = $data['form_photo'] ?: '/source/uploads/dump.jpg';

        $params = ['product_title' => $form_product,
                   'product_price' => $form_price,
                   'product_photo' => $form_photo,
                   'product_description' => $form_description
                  ];

        $sql = sprintf('INSERT INTO %s 
               (product_id, product_title, product_price, product_photo, product_description) 
                VALUES (null, :product_title, :product_price, :product_photo, :product_description)',
            $this->table);

        $smtp = $this->db->prepare($sql);
        $smtp->execute($params);

        return true;
    }

    // Функция обновления данных товара по ID
    public function updateProduct($id)
    {
    }

    // Функция получения товаров, находящихся на модерации (статус product_is_moderate = 0)
    public function getNotModeratedProducts()
    {
    }

    // Функция получения товаров, прошедших модерацию (статус product_is_moderate = 1)
    public function getModeratedProducts()
    {
    }

    // Функция получения всех товаров из таблицы Products
    public function getAllProducts()
    {
    }
}