<?php

namespace App\Actions\User;

use App\Models\User;
use App\Parents\Actions\ParentAction;
use App\Services\UserService;

class DeleteUsersAction extends ParentAction
{
    public function __construct(
        public UserService $userService
    )
    {
    }

    public function run(User $user): bool
    {
        return $this->userService->delete($user);
    }
}
