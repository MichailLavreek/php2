<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\DB;
use App\Exceptions\Error404;
use App\Exceptions\MultiException;
use App\Logger;

class Error extends Controller
{
    protected $exception;
    protected $logger;

    public function __construct($exception)
    {
        parent::__construct();
        
        $this->exception = $exception;

        $this->logger = new Logger();

        if ($exception instanceof MultiException) {
            $this->logger->log('exception', $exception); 
        }

        if ($exception instanceof DB) {
            $this->logger->log('warning', $exception);
        }

        if ($exception instanceof Error404) {
            $this->logger->log('notice', $exception);
        }
    }
    
    protected function actionDefault()
    {
        $this->view->errorMessage = $this->exception->getMessage();
        $this->view->exception = $this->exception;
        $this->view->display(__DIR__ . '/../templates/error.php');
    }
}