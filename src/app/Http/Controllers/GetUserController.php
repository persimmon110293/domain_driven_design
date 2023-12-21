<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ApplicationService\IGetUserAppService;

class GetUserController extends Controller
{
    private $appService;

    public function __construct(IGetUserAppService $getUserAppService)
    {
        $this->appService = $getUserAppService;
    }

    public function __invoke()
    {
        return $this->appService->getUser();
    }
}
