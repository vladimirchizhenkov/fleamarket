<?php

namespace model;

class ProductModel extends BaseModel
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db, 'products');
    }

    // Функция получения всех продуктов
    public function getAllProducts() {
        $sql = sprintf("SELECT * FROM %s LEFT JOIN `users` ON users.id = products.product_user_id WHERE products.product_is_moderate = '1'", $this->table);
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    // Функция получения одного продукта по ID
    public function getProductByID($id) {
        $params = ['id' => $id];
        $sql = sprintf('SELECT * FROM %s JOIN `users` ON users.id = products.product_user_id WHERE products.product_id = :id', $this->table);

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetch();
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

    // Функция удаления товара по ID (полное удаление)
    public function deleteProduct($itemID) : bool
    {
        $params = ['id' => $itemID];
        $sql = sprintf('DELETE * FROM %s WHERE id = :id', $this->table);

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return true;
    }

    // Функция получения товаров, находящихся на модерации (статус product_is_moderate = 0)
    public function getNotModeratedProducts()
    {
    }

    // Функция получения товаров, прошедших модерацию (статус product_is_moderate = 1)
    public function getModeratedProducts()
    {
    }
}