<?php

namespace App\Admin\Controllers;

use App\Controller;
use App\View;

class News extends Controller
{
    protected function actionDefault()
    {
        $this->view->news = \App\Models\News::findAll();
        echo $this->view->render(__DIR__ . '/../templates/all-news.php');
    }

    protected function actionEdit()
    {
        $id = (!empty($_GET['id'])) ? $_GET['id'] : false;
        $this->view->news = \App\Models\News::findById($id);
        echo $this->view->render(__DIR__ . '/../templates/article.php');
    }

    protected function actionSave()
    {
        $id = (!empty($_GET['id'])) ? $_GET['id'] : false;

        if (false === $id) {
            $this->view->isEmptyId = true;
        } else {
            $article = \App\Models\News::findById($id);
        }

        if (empty($_POST['title']) || empty($_POST['text'])) {
            $this->view->isEmptyInputs = true;
        } else {
            $article->title = $_POST['title'];
            $article->text = $_POST['text'];
            $article->save();
        }

        echo $this->view->render(__DIR__ . '/../templates/save.php');
    }
}