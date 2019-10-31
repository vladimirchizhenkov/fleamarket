<?php

namespace models;

use core\DB;

class FastProductModel extends BaseModel
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db, 'fast_trade');
    }

    public function addFastProduct($data)
    {

//      extract($data); --- возможно будет более лаконично с этой функцией;

        $form_name       = $data['form_name'];
        $form_tel        = $data['form_tel'];
        $form_city       = $data['form_city'];
        $form_product    = $data['form_product'];
        $form_price      = (int)$data['form_price'];
        $form_photo      = $data['form_photo'];

        $params = ['ftrade_user' => $form_name, 'ftrade_contact' => $form_tel, 'ftrade_city' => $form_city, 'ftrade_product' => $form_product, 'ftrade_price' => $form_price, 'ftrade_photo' => $form_photo];

        $sql = sprintf('INSERT INTO %s (ftrade_id, ftrade_user, ftrade_city, ftrade_contact, ftrade_product, ftrade_price, ftrade_photo) VALUES (null, :ftrade_user, :ftrade_city, :ftrade_contact, :ftrade_product, :ftrade_price, :ftrade_photo)', $this->table);

        $smtp = $this->db->prepare($sql);
        $smtp->execute($params);
    }

}