<?php

namespace core;

abstract class Helper
{
    static public function prepareResponse($data) {
        return $data;
    }

    static public function getResponse($data) {
        return json_encode($data);
    }
}
