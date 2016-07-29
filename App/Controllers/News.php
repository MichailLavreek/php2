<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\Error404;

class News extends Controller
{
    protected function actionDefault()
    {
        $this->view->news = \App\Models\News::findAll();
        echo $this->view->render(__DIR__ . '/../templates/index.php');
    }

    protected function actionDisplayOne()
    {
        $id = $_GET['id'];
        $this->view->news = \App\Models\News::findById($id);

        if (empty($this->view->news)) {
            $exception = new Error404('Запись не найдена');
            throw $exception;
        }
        
        echo $this->view->render(__DIR__ . '/../templates/article.php');
    }

    protected function actionFill()
    {
        $data = ['title'=>'заголовок', 'text'=>'текст'];
        
        $news = new \App\Models\News();
        $news->fill($data);
    }
}

