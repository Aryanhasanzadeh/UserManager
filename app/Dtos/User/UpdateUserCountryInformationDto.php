<?php

namespace App\Dtos\User;

use App\Parents\Dtos\ParentDto;

class UpdateUserCountryInformationDto extends ParentDto
{
    public function __construct(
        public ?object $country,
        public ?object $currencies,
    )
    {
    }
}
