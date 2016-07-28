<?php

require __DIR__ . '/../../autoload.php';

use App\Models\News;

if (isset($_GET['create']) && true == $_GET['create']) {
    $singleNews = new News();
    include __DIR__ . '/templates/article.php';
}

if (isset($_GET['del']) && true == $_GET['del']) {
    $id = $_GET['id'];
    $singleNews = News::findById($id);
    $singleNews->delete();
    header('Location:all-news.php');
}

if (isset($_GET['upd']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $singleNews = News::findById($id);
    $singleNews->title = $_POST['title'];
    $singleNews->text = $_POST['text'];
    $singleNews->save();
    header('Location:all-news.php');
}

if (isset($_GET['upd']) && empty($_POST['id'])) {
    $singleNews = new News();
    $singleNews->title = $_POST['title'];
    $singleNews->text = $_POST['text'];
    $singleNews->save();
    header('Location:all-news.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $singleNews = News::findById($id);
    include __DIR__ . '/templates/article.php';
}
