<?php

namespace App\Dtos\User;

use App\Parents\Dtos\ParentDto;

class CreateUserDto extends ParentDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $country,
    )
    {
    }
}
