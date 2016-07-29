<?php

namespace App\Controllers;

use App\Controller;
use App\Logger;

class Error extends Controller
{
    protected $errorMessage;
    protected $exception;

    public function __construct($exception)
    {
        parent::__construct();
        
        $this->exception = $exception;
        $this->errorMessage = $this->exception->getMessage();

        new Logger($exception);
    }
    
    protected function actionDefault()
    {
        $this->view->errorMessage = $this->errorMessage;
        $this->view->exception = $this->exception;
        $this->view->display(__DIR__ . '/../templates/error.php');
    }
}