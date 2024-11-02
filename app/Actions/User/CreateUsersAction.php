<?php

namespace App\Actions\User;

use App\Dtos\User\CreateUserDto;
use App\Jobs\User\UpdateUserCountryInformation;
use App\Models\User;
use App\Parents\Actions\ParentAction;
use App\Services\UserService;

class CreateUsersAction extends ParentAction
{
    public function __construct(
        protected UserService $userService,
    )
    {
    }

    public function run(CreateUserDto $dto): User
    {
        $user = $this->userService->create($dto);

        UpdateUserCountryInformation::dispatch($user, $dto->country);

        return $user;
    }
}
