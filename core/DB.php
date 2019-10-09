<?php

namespace core;

class DB
{
    public static function connect() {
        $dsn = sprintf('%s:host=%s;dbname=%s', 'mysql','localhost', 'fleaphp');
        return new \PDO($dsn, 'root','root');
    }
}
