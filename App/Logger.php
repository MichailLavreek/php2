<?php

namespace App;

use Psr\Log\LoggerInterface;

class Logger implements LoggerInterface
{
    protected $data;
    protected $file = __DIR__ . '/log.txt';

    public function exception($e)
    {
        $method = mb_strtoupper(substr(__METHOD__, 2 + strrpos(__METHOD__, '::')));
        if (isset($e[0])) {
            foreach ($e as $key => $value) {
                $this->data[] =
                    '[' . $method . '] '
                    . date('y-m-d  G:i:s')
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
            $this->data =
                '[' . $method . '] '
                . date('y-m-d  G:i:s')
                . ' = '
                . $e->getFile()
                . '  line: '
                . $e->getLine()
                . "\n"
                . $e->getMessage();
        }

        file_put_contents($this->file, $this->data . "\n", FILE_APPEND);

        $this->data = null;
    }

    
    public function emergency($message, array $context = array())
    {
        
    }
    
    public function alert($message, array $context = array())
    {
        
    }
    
    public function critical($message, array $context = array())
    {
        
    }

    public function error($message, array $context = array())
    {

    }

    public function warning($message, array $context = array())
    {
        $method = mb_strtoupper(substr(__METHOD__, 2 + strrpos(__METHOD__, '::')));

        $this->doLog($method, $message);
    }

    public function notice($message, array $context = array())
    {
        $method = mb_strtoupper(substr(__METHOD__, 2 + strrpos(__METHOD__, '::')));

        $this->doLog($method, $message);
    }

    public function info($message, array $context = array())
    {
        
    }

    public function debug($message, array $context = array())
    {
        
    }

    public function log($level, $message, array $context = array())
    {
        $level = mb_strtolower($level);
        $this->$level($message, $context);
    }

    private function doLog($method, $message)
    {
        if ($message instanceof \Exception) {
            $this->data =
                '[' . $method . '] '
                . date('y-m-d  G:i:s')
                . ' = '
                . $message->getFile()
                . '  line: '
                . $message->getLine()
                . "\n"
                . $message->getMessage();

        } else {
            $this->data =
                '[' . $method . '] '
                . date('y-m-d  G:i:s')
                . ' = ' . "\n"
                . $message;
        }

        file_put_contents($this->file, $this->data . "\n", FILE_APPEND);
        $this->data = null;
    }
}