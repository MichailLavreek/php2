<?php

namespace App\Controllers;

use App\Controller;

class Error extends Controller
{
    protected $errorMessage;

    public function __construct($errorMessage)
    {
        parent::__construct();
        
        $this->errorMessage = $errorMessage;
    }
    
    protected function actionDefault()
    {
        $this->view->errorMessage = $this->errorMessage;
        $this->view->display(__DIR__ . '/../templates/error.php');
    }
}