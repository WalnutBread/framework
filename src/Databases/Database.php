<?php

namespace WalnutBread\Databases;

interface Database
{

    public function setup($dns, $userName, $password, $database = null, $port = null);

}