<?php

namespace App\Models;

use App\Exceptions\Data;
use App\Exceptions\MultiException;
use App\Model;
use App\Traits\DinamicProperties;

class News extends Model
{
    use DinamicProperties;

    const TABLE = 'news';

    public $id;
    public $title;
    public $text;
    public $author_id;
    
    public static function getLastNews($num)
    {
        $rez = static::findAll();
        $rez = array_slice($rez, -$num);
        $rez = array_reverse($rez);
        return $rez;
    }

    /**
     * @param string
     * @return object
     */
    public function __get($name)
    {
        if ('author' == $name && isset($this->author_id)) {
            return Author::findById($this->author_id);
        }

        if (isset($this->data[$name])) {
            return $this->data[$name];
        }

        return new Author();
    }

    public function fill($data)
    {
        $multiException = new MultiException();

        if (isset($data['title'])) {
            $this->title = $data['title'];
        } else {
            $multiException[] = new Data('Нет заголовка!');
        }

        if (array_key_exists('text', $data)) {
            $this->text = $data['text'];
        } else {
            $multiException[] = new Data('Нет текста!');
        }

        if (isset($multiException[0])) {
            throw $multiException;
        }

        echo 'fill';
    }
}