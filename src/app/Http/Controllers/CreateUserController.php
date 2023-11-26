<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ApplicationService\CreateUserAppService;

class CreateUserController extends Controller
{
    private $appService;

    public function __construct(CreateUserAppService $createUserAppService)
    {
        $this->appService = $createUserAppService;
    }

    public function __invoke(Request $request)
    {
        return $this->appService->crate($request->id);
    }
}
