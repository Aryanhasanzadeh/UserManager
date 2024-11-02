<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Parents\Requests\ParentRequest;

/**
 * @property User $user
 */
class UserUpdateRequest extends ParentRequest
{
    protected function getRules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:190'],
            'email' => ['required', 'email', 'unique:users,'. $this->user?->id],
            'country' => ['required', 'string', 'min:3', 'max:30'],
        ];
    }
}
