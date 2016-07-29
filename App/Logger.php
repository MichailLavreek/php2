<?php

namespace App;

class Logger
{
    protected $data;
    
    public function __construct($e)
    {
        $this->data = date('y-m-d  G:i:s') 
            . ' = ' 
            . $e->getFile() 
            . '  line: ' 
            . $e->getLine() 
            . "\n" 
            . $e->getMessage();
        $this->log();
    }

    protected function log()
    {
        file_put_contents(__DIR__ . '/log.txt', $this->data . "\n\n", FILE_APPEND);
    }
}