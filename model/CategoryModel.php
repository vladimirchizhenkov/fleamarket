<?php

namespace model;

class CategoryModel extends BaseModel {
    public function __construct(\PDO $db)
    {
        parent::__construct($db, 'categories');
    }

    public function getAllCategories()
    {
        $sql = sprintf("SELECT * FROM %s WHERE `category_parent` <> '0' ORDER BY `category_parent` ASC", $this->table);
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    // Получаем только родительские категории
    public function getOnlyParentCats()
    {
    }

    // Получаем только дочерние категории
    public function getOnlyChildrenCats()
    {
    }

    // Реализовать позже: Функция подготавливает всех иерархию категорий //
    private function prepareCatList()
    {
    }
}