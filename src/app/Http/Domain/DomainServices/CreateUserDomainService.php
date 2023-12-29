<?php

namespace App\Http\Domain\DomainServices;

use Illuminate\Http\Request;

class CreateUserDomainService
{
    public function createUser(Request $request): array
    {
        return ['test from domain service'];
    }
}
