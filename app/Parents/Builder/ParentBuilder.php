<?php

namespace App\Parents\Builder;

use App\Traits\MockHelpersTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

abstract class ParentBuilder
{
    use MockHelpersTrait;

    public static function new(): static
    {
        return new static();
    }

    protected string $defaultSort = '-created_at';

    abstract protected function getQueryBuilder(): QueryBuilder;

    abstract protected function getAllowedFilters(): array;

    abstract protected function getAllowedSorts(): array;

    private function preparingQuery(): QueryBuilder
    {
        return $this->getQueryBuilder()
            ->allowedFilters($this->getAllowedFilters())
            ->allowedSorts($this->getAllowedSorts())
            ->defaultSort($this->defaultSort);
    }

    public function get(): Collection|array
    {
        return $this->preparingQuery()
            ->get();
    }

    public function getPaginate(): LengthAwarePaginator
    {
        return $this->preparingQuery()
            ->paginate(request()->get('per_page', config('site_settings.default_per_page')));
    }
}
