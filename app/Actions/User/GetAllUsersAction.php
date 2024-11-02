<?php

namespace App\Actions\User;

use App\Builder\User\UserBuilder;
use App\Parents\Actions\ParentAction;
use Illuminate\Pagination\LengthAwarePaginator;

class GetAllUsersAction extends ParentAction
{
    public function run(): LengthAwarePaginator
    {
        return UserBuilder::new()->getPaginate();
    }
}
