<?php

namespace App\Exceptions;

use App\Traits\TCollection;

class Error404 extends \Exception
    implements \ArrayAccess, \Iterator
{
    use TCollection;
}