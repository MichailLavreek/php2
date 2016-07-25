<?php

namespace App;

class DB
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=test', 'root', '');
    }
    
    public function execute($sql) 
    {
        $sth = $this->dbh->prepare($sql);
        $rez = $sth->execute();
        return $rez;
    }

    public function query($sql, $class = 'stdClass')
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
    
}
