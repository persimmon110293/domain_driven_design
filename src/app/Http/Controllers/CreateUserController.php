<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ApplicationService\ICreateUserAppService;

class CreateUserController extends Controller
{
    private $appService;

    public function __construct(ICreateUserAppService $createUserAppService)
    {
        $this->appService = $createUserAppService;
    }

    public function __invoke(Request $request)
    {
        return $this->appService->createUser($request);
    }
}
