<?php

namespace App;

class DB
{
    public function __construct()
    {
        $dbh = new \PDO('mysql:host=localhost;dbname=test', 'root', '');
    }
}
