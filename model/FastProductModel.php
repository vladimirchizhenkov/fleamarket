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

//      extract($data);

        $form_name    = $data['form_name'];
        $form_tel     = $data['form_tel'];
        $form_city    = $data['form_city'];
        $form_product = $data['form_product'];
        $form_price   = (int)$data['form_price'];

        $params = ['ftrade_user' => $form_name, 'ftrade_contact' => $form_tel, 'ftrade_city' => $form_city, 'ftrade_product' => $form_product, 'ftrade_price' => $form_price];

        $sql = sprintf('INSERT INTO %s (ftrade_id, ftrade_user, ftrade_city, ftrade_contact, ftrade_product, ftrade_price) VALUES (null, :ftrade_user, :ftrade_contact, :ftrade_city, :ftrade_product, :ftrade_price)', $this->table);

        $smtp = $this->db->prepare($sql);
        $smtp->execute($params);
    }

}