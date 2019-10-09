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
    private $db;
    private $table;

    public function __construct(\PDO $db, $table)
    {
        $this->db = $db;
        $this->table = $table;
    }

    public function getAllItems() {
        $sql = sprintf('SELECT * FROM %s', $this->table);
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    public function getItemByID($id) {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id', $this->table);

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id' => $id]);

        return $stmt->fetch();
    }
}