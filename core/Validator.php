<?php
namespace core;

abstract class Validator
{
    private static $errors = [
        'name' => ['Имя не должно быть короче двух символов', 'Имя должно состоять только из букв'],
        'password' => ['Небезопасный пароль. Введите пароль не короче шести символов'],
        'contact' => ['Телефон не должен содержать буквы'],
        'city' => ['Название города не должно только буквы'],
        'title' => ['Название не должно быть короче двух символов'],
        'description' => [],
        'price' => ['Цена должна содержать только цифры'],
        'file' => []
    ];

    public static function checkForm($form) {
        if (!empty($form['form_name'])) {
            return self::checkName($form['form_name']);
        }
        return true;
    }

    private static function checkName($name)
    {
        if (strlen($name) < 2) {
            return self::$errors['name'][0];
        }
//        if (!preg_match("/^[a-zA-Zа-яА-Я]$", $name)) {
//            return self::$errors['name'][1];
//        }
        return true;
    }

    private function checkPassword($password)
    {
    }

    private function checkPrice($price)
    {
    }
}
