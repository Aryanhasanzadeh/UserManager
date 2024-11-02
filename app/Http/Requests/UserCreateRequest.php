<?php

namespace App\Http\Requests;

use App\Parents\Requests\ParentRequest;

class UserCreateRequest extends ParentRequest
{
    protected function getRules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:190'],
            'email' => ['required', 'email', 'unique:users'],
            'country' => ['required', 'string', 'min:3', 'max:30'],
        ];
    }
}
