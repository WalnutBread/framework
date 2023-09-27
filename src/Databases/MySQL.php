<?php

namespace WalnutBread\Databases;

use mysqli;

class MySQL implements Database
{

    private $mysql;

    private $stmt;

    public function setup($dns, $userName, $password, $database = null, $port = null) {
        $this->mysql = new mysqli($dns, $userName, $password, $database, $port);
    }

    public function prepare($query) {
        $this->stmt = $this->mysql->prepare($query);
    }

    public function bind($type, $param = []) {
        $this->stmt->bind_param($type, ...$param);
    }

    public function execute() {
        $this->stmt->execute();
    }

    public function getResult() {
        return $this->stmt->get_result();
    }
}