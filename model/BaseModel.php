<?php
/**
 * Created by PhpStorm.
 * User: IdeaFix
 * Date: 16.09.2019
 * Time: 23:03
 */

namespace models;

abstract class BaseModel
{
    protected $db;
    protected $table;

    public function __construct(\PDO $db, $table)
    {
        $this->db = $db;
        $this->table = $table;
    }

    public function getAllItems() {
        $sql = sprintf('SELECT * FROM %s JOIN `users` ON users.user_id = product.product_user_id', $this->table);
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    public function getItemByID($id) {
        $params = ['id' => $id];
        $sql = sprintf('SELECT * FROM %s JOIN `users` ON users.user_id = product.product_user_id WHERE product.product_id = :id', $this->table);

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetch();
    }

}