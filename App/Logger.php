<?php

namespace App;

class Logger
{
    protected $data;
    
    public function __construct($e)
    {
        if (isset($e[0])) {
            foreach ($e as $key => $value) {
                $this->data[] = date('y-m-d  G:i:s')
                    . ' = '
                    . $e[$key]->getFile()
                    . '  line: '
                    . $e[$key]->getLine()
                    . "\n"
                    . $e[$key]->getMessage()
                    . "\n";
            }
            
            $this->data = implode('', $this->data);
        } else {
            $this->data = date('y-m-d  G:i:s')
                . ' = '
                . $e->getFile()
                . '  line: '
                . $e->getLine()
                . "\n"
                . $e->getMessage();
        }
        
        $this->log();
    }

    protected function log()
    {
        file_put_contents(__DIR__ . '/log.txt', $this->data . "\n", FILE_APPEND);
    }
}