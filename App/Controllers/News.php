<?php

namespace App\Controllers;

use App\Controller;

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
        echo $this->view->render(__DIR__ . '/../templates/article.php');
    }

    protected function actionFill()
    {
        $news = new \App\Models\News();
        $news->fill(['title'=>'заголовок', 'text'=>'текст']);
    }
}

