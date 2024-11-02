<?php

namespace App\Parents\Builder\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class JsonSearchFilter implements Filter
{
    /**
     * The columns that teh like condition should be applied.
     */
    private string $columns;

    /*
     * Initialise the class.
     */
    public function __construct($columns)
    {
        $this->columns = $columns;
    }

    /**
     * Implement like condition on some columns.
     */
    public function __invoke(Builder $query, $value, string $property): void
    {
        $query->whereJsonContains($this->columns, $value);
    }
}

