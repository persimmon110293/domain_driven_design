<?php

namespace App\Http\ApplicationService;

use App\Http\Repositories\UserRepository;
use App\Http\Domain\DomainServices\CreateUserDomainService;
use App\Http\ApplicationService\ICreateUserAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateUserAppService implements ICreateUserAppService
{
    private $domainService;
    private $userRepository;

    public function __construct(CreateUserDomainService $createUserDomainService, UserRepository $userRepository)
    {
        $this->domainService = $createUserDomainService;
        $this->userRepository = $userRepository;
    }

    public function createUser(Request $request): bool
    {
        return $this->userRepository->createUser($request->all());
    }
}
