<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ApplicationService\IGetUserAppService;
use App\Http\Translators\GetUserTranslator;
use Exception;

class GetUserController extends Controller
{
    private $appService;
    private $translator;

    public function __construct(IGetUserAppService $getUserAppService, GetUserTranslator $getUserTranslator)
    {
        $this->appService = $getUserAppService;
        $this->translator = $getUserTranslator;
    }

    public function __invoke(Request $request)
    {
        try {
            $id = $request->query('id');
            $user = $this->appService->getUser($id);

            $user = $this->translator->translate($user);
            return $user;
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
