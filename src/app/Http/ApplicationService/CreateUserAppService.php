<?php

namespace App\Http\ApplicationService;

use App\Http\Domain\DomainServices\CreateUserDomainService;

class CreateUserAppService
{
    private $domainService;

    public function __construct(CreateUserDomainService $createUserDomainService)
    {
        $this->domainService = $createUserDomainService;
    }

    public function crate($id)
    {
        return $this->domainService->create($id);
    }
}
