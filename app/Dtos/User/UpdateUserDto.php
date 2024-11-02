<?php

namespace App\Dtos\User;

use App\Parents\Dtos\ParentDto;

class UpdateUserDto extends ParentDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $country,
    )
    {
    }
}
