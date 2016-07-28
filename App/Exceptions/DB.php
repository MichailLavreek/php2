<?php

namespace App\Exceptions;

use App\Traits\TCollection;

class DB extends \Exception
    implements \ArrayAccess, \Iterator
{
    use TCollection;
}