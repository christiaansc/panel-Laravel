<?php

namespace App\dataTransferObjects;

use App\Http\Requests\user\UserRequest;

class UserDto
{
    public  function __construct(
        public readonly string  $name,
        public readonly string $email,
        public readonly string $password,
    ) {
    }

    public static function  validatedRequest(UserRequest $request): self
    {
        return new self(
            name: $request->validated()['name'],
            email: $request->validated()['email'],
            password: $request->validated()['password'],
        );
    }
}
