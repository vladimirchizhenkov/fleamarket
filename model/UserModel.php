<?php

namespace models;

use core\DB;

class UserModel {

    private $db;
    private $table = 'users';

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    // Функция регистрации нового пользователя в системе
    public function registerUser()
    {
    }

    // Функция обновления данных пользователя
    public function updateDataUser($id)
    {
    }

    // Функция удаления юзера из системы
    public function deleteUser($id)
    {
    }

    // Функция для генерации пароля
    public function getPassword()
    {
    }

    // Функция для изменения роли пользователя в системе
    public function editUserRole($id, $role)
    {
    }

    // Функция для активации/деактивации пользователя в системе
    public function setUserStatus($status)
    {
    }

}