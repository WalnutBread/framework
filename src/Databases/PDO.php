<?php

namespace WalnutBread\Databases;

class PDO implements Database
{
    private $pdo;

    private $sth;

    public function setup($dns, $userName, $password, $database = '', $port = '') {
        $this->pdo = new \PDO($dns, $userName, $password);
    }

    public function exec($query, $params = []) {
        if($this->sth = $this->pdo->prepare($query)) {
            return $this->sth->execute($params);
        }
        return false;
    }

    public function getAll($query, $params = [], $className = 'stdClass') {
        if($this->exec($query, $params)) {
            return $this->sth->fetchAll(\PDO::FETCH_CLASS, $className);
        }
        return false;
    }
}