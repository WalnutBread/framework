<?php
namespace WalnutBread\Databases;

class DatabaseAdaptor
{
    private static $pdo;

    private static $sth;

    public static function setup($dns, $userName, $password) {
        self::$pdo = new \PDO($dns, $userName, $password);
    }

    public static function exec($query, $params = []) {
        if(self::$sth = self::$pdo->prepare($query)) {
            return self::$sth->execute($params);
        }
    }

    public static function getAll($query, $params = [], $className = 'stdClass') {
        if(self::exec($query, $params)) {
            return self::$sth->fetchAll(\PDO::FETCH_CLASS, $className);
        }
    }
}