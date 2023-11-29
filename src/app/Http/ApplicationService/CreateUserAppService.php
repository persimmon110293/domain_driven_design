<?php

namespace App\Http\ApplicationService;

use App\Http\Domain\DomainServices\CreateUserDomainService;
use App\Http\ApplicationService\ICreateUserAppService;
use Illuminate\Http\Request;

class CreateUserAppService implements ICreateUserAppService
{
    private $domainService;

    public function __construct(CreateUserDomainService $createUserDomainService)
    {
        $this->domainService = $createUserDomainService;
    }

    public function createUser(Request $request): array
    {
        return $this->domainService->createUser($request);
    }
}
