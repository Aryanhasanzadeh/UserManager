<?php

namespace App\Actions\User;

use App\Dtos\User\UpdateUserDto;
use App\Jobs\User\UpdateUserCountryInformation;
use App\Models\User;
use App\Parents\Actions\ParentAction;
use App\Services\UserService;

class UpdateUsersAction extends ParentAction
{
    public function __construct(
        public UserService $userService
    )
    {
    }

    public function run(User $user, UpdateUserDto $dto): bool
    {
        $check = $this->userService->update(
            $user, $dto->except('country')
        );

        UpdateUserCountryInformation::dispatchIf(
            fn() => $check , $user, $dto->country);

        return $check;
    }
}
