<?php

namespace App\Services;

use App\Dtos\User\CreateUserDto;
use App\Dtos\User\UpdateUserCountryInformationDto;
use App\Dtos\User\UpdateUserDto;
use App\Models\User;
use App\Parents\Service\ParentService;

class UserService extends ParentService
{
    public function create(CreateUserDto $dto): User|null
    {
        return User::create($dto->except('country')->toArray());
    }

    public function update(User $user, UpdateUserDto $dto): bool
    {
        return $user->updateOrFail($dto->except('country')->toArray());
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function updateCountryInformation(
        User                            $user,
        UpdateUserCountryInformationDto $dto
    ): bool
    {
        return $user->updateOrFail($dto->toArray());
    }
}
