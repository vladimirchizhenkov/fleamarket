<?php
/**
 * Created by PhpStorm.
 * User: IdeaFix
 * Date: 16.09.2019
 * Time: 23:03
 */

namespace model;

abstract class BaseModel
{
    protected $db;
    protected $table;

    public function __construct(\PDO $db, $table)
    {
        $this->db = $db;
        $this->table = $table;
    }
}