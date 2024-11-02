<?php

namespace App\Http\Requests;

use App\Parents\Requests\ParentRequest;

class UserIndexRequest extends ParentRequest
{
    protected function getRules(): array
    {
//        this request used for validate list filter options
        return [
            'filter' => ['array'],
            'filter.country' => ['string', 'min:3', 'max:150'],
            'filter.currency' => ['string', 'min:2', 'max:150'],
        ];
    }
}
