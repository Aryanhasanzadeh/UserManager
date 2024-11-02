<?php

namespace App\Parents\Service;

use App\Traits\MockHelpersTrait;

abstract class ParentService
{
    use MockHelpersTrait;
    public static function new(): self
    {
        return new static();
    }
}
