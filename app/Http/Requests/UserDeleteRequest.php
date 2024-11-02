<?php

namespace App\Http\Requests;

use App\Parents\Requests\ParentRequest;

class UserDeleteRequest extends ParentRequest
{
    protected function getRules(): array
    {
//        this request used for validate user permission and owner etc
        return [

        ];
    }

}
