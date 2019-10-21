<?php

namespace core;

class DB
{
    public static function connect() {
        $dsn = sprintf('%s:host=%s;dbname=%s', 'mysql','localhost', 'fleaphp');
        return new \PDO($dsn, 'root','root');
    }

    public static function checkerror($query)
    {
        $info = $query->errorInfo();

        if ($info[0] != PDO::ERR_NONE) {
            exit($info[2]);
        }
    }
}
