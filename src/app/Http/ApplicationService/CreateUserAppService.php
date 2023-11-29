<?php

namespace App\Http\ApplicationService;

use App\Http\Domain\DomainServices\CreateUserDomainService;
use App\Http\ApplicationService\ICreateUserAppService;
use App\Http\Repositories\IUserRepository;
use Illuminate\Http\Request;

class CreateUserAppService implements ICreateUserAppService
{
    private $domainService;
    private $repository;

    public function __construct(CreateUserDomainService $createUserDomainService, IUserRepository $userRepository)
    {
        $this->domainService = $createUserDomainService;
        $this->repository = $userRepository;
    }

    public function createUser(Request $request): array
    {
        return $this->domainService->createUser($request);
    }
}
