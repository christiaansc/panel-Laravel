<?php

namespace App\dataTransferObjects;

use App\Http\Requests\category\CategoryRequest;

class CategoryDto
{
    public  function __construct(
        public readonly string  $name,
        public readonly ?string $description,
        public readonly bool $status,

    ) {
    }

    public static function  validatedRequest(CategoryRequest $request): CategoryDto
    {
        return new self(
            name: $request->validated()['name'],
            description: $request->validated()['description'] ?? null,
            status: $request->validated()['status'],
        );
    }
}
