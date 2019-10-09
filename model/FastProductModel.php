<?php

namespace models;

class FastProductModel extends BaseModel
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db, 'fast_trade');
    }
}