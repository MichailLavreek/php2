<?php

namespace App;

class DB
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=test', 'root', '');
    }
    
    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $rez = $sth->execute($params);
        return $rez;
    }

    public function query($sql, $class = 'stdClass', $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
    
}
