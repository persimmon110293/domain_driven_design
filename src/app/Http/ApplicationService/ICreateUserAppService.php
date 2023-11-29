<?php

namespace App\Http\ApplicationService;

use Illuminate\Http\Request;

interface ICreateUserAppService
{
    public function createUser(Request $request): array;
}

