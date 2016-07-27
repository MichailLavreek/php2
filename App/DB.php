<?php

namespace App;

class DB
{
    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $config = \App\Config::getInstance();
        $data = $config->data['db'];
        $sth = 'mysql:host=' . $data['host'] . ';dbname=' . $data['dbname'];
        $user = $data['user'];
        $pass = $data['pass'];

        $this->dbh = new \PDO($sth, $user, $pass);
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

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }
}
