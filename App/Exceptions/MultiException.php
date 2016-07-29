<?php

namespace App\Exceptions;

use App\Traits\TCollection;

class MultiException extends \Exception
    implements \ArrayAccess, \Iterator
{
    use TCollection;
}