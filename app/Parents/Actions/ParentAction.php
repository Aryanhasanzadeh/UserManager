<?php

namespace App\Parents\Actions;

use App\Traits\MockHelpersTrait;
use Illuminate\Support\Facades\DB;

abstract class ParentAction
{
    use MockHelpersTrait;
    public function transactionalRun(...$arguments)
    {
        return DB::transaction(function () use ($arguments) {
            return static::run(...$arguments);
        });
    }
}
