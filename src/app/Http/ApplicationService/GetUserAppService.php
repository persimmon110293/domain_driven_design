<?php

namespace App\Http\ApplicationService;

use App\Http\ApplicationService\IGetUserAppService;
use App\Http\Domain\DomainServices\GetUserDomainService;
use App\Http\Repositories\IUserRepository;
use App\Exceptions\UserNotFoundException;

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
        if ($user === null) {
            throw new UserNotFoundException("User not found.");
        }

        return $this->domainService->getUser($user);
    }
}
