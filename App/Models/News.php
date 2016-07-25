<?php

namespace App\Models;

use App\Model;

class News extends Model
{
    const TABLE = 'news';

    public $id;
    public $title;
    public $text;
    
    public static function getLastNews($num)
    {
        $rez = static::findAll();
        $rez = array_slice($rez, -$num);
        $rez = array_reverse($rez);
        return $rez;
    }
}