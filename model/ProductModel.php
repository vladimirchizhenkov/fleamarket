<?php
/**
 * Created by PhpStorm.
 * User: IdeaFix
 * Date: 16.09.2019
 * Time: 22:47
 */

// На данный момент эта модель не используется, только FastProductModel;

namespace models;

class ProductModel extends BaseModel
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db, 'products');
    }
}