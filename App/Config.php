<?php

namespace App;

class Config
{
    use Singleton;

    public $data;
    
    protected function __construct()
    {
        $this->setDb();
    }

    protected function setDb()
    {
        $file = file(__DIR__ . '/Configs/DB.txt');

        foreach ($file as $value) {
            $keyStr = trim(substr($value, 0, strpos($value, '=')));
            $valueStr = trim(substr($value, 1 + strpos($value, '=')));

            $this->data['db'][$keyStr] = $valueStr;
        }
    }
}