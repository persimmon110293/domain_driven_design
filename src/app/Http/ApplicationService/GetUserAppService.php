<?php

namespace App\Http\ApplicationService;

use App\Http\ApplicationService\IGetUserAppService;
use App\Http\Domain\DomainServices\GetUserDomainService;
use App\Http\Repositories\IUserRepository;

class GetUserAppService implements IGetUserAppService
{
    private $domainService;
    private $repository;

    public function __construct(GetUserDomainService $getUserDomainService, IUserRepository $userRepository)
    {
        $this->domainService = $getUserDomainService;
        $this->repository = $userRepository;
    }

    public function getUser(string $id)
    {
        $user = $this->repository->getUserById($id);
        return $this->domainService->getUser($user);
    }
}
