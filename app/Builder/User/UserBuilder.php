<?php

namespace App\Builder\User;

use App\Models\User;
use App\Parents\Builder\Filters\JsonSearchFilter;
use App\Parents\Builder\ParentBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserBuilder extends ParentBuilder
{

    protected function getQueryBuilder(): QueryBuilder
    {
        return QueryBuilder::for(User::class);
    }

    protected function getAllowedFilters(): array
    {
        return [
            AllowedFilter::custom('country', new JsonSearchFilter('country->common')),
            AllowedFilter::custom('currency', new JsonSearchFilter('currencies->*->symbol'))
        ];
    }

    protected function getAllowedSorts(): array
    {
        return [

        ];
    }
}
