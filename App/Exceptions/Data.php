<?php

namespace App\Exceptions;

use App\Traits\TCollection;

class Data extends \Exception
    implements \ArrayAccess, \Iterator
{
    use TCollection;
}