<?php

namespace App\Models;

use App\Model;

class Author extends Model
{

    const TABLE = 'authors';

    public $id;
    public $name;
    public $email;
}