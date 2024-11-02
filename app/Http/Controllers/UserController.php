<?php

namespace App\Http\Controllers;

use App\Actions\User\CreateUsersAction;
use App\Actions\User\DeleteUsersAction;
use App\Actions\User\GetAllUsersAction;
use App\Actions\User\UpdateUsersAction;
use App\Dtos\User\CreateUserDto;
use App\Dtos\User\UpdateUserDto;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserIndexRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Parents\Controller\ParentController;
use Illuminate\Http\JsonResponse;


class UserController extends ParentController
{
    /**
     * get list of users.
     */
    public function index(UserIndexRequest $request): JsonResponse
    {
        return $this->response(
            UserResource::collection(
                resolve(GetAllUsersAction::class)
                    ->run()
            )
        );
    }


    /**
     * Create new User.
     */
    public function store(UserCreateRequest $request): JsonResponse
    {
        return $this->responseCreated(
            UserResource::make(
                resolve(CreateUsersAction::class)
                    ->run(
                        CreateUserDto::from($request->validated())
                    )
            )
        );
    }


    /**
     * Update the specified User.
     */
    public function update(User $user, UserUpdateRequest $request): JsonResponse
    {
        resolve(UpdateUsersAction::class)
            ->run($user, UpdateUserDto::from($request->validated()));

        return $this->responseNoContent();
    }

    /**
     * Remove the specified User.
     */
    public function destroy(User $user, UserDeleteRequest $request): JsonResponse
    {
        resolve(DeleteUsersAction::class)->run($user);

        return $this->responseNoContent();
    }
}
