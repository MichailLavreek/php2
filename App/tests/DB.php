<?php

require __DIR__ . '/../../autoload.php';

function querry() 
{
    $db = new \App\DB();
    $data = $db->query('SELECT * FROM users WHERE id=:id', '\App\Models\User', [':id' => '1'])[0];
    if ($data->name === 'иван') {
        return true;
    }
    return false;
}

if (assert(querry())) {
    echo 'Тест на подстановки в методе query ПРОЙДЕН.<br>';
}

function execute()
{
    $db = new \App\DB();
    $answer = $db->execute('SELECT * FROM users WHERE id=:id', [':id' => '1']);
    return $answer;
}

if (assert(execute())) {
    echo 'Тест на подстановки в методе execute ПРОЙДЕН.<br>';
}
