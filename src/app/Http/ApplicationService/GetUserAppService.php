<?php

namespace App\Http\ApplicationService;

use App\Http\ApplicationService\IGetUserAppService;
use App\Http\Domain\DomainServices\GetUserDomainService;

class GetUserAppService implements IGetUserAppService
{
    private $domainService;

    public function __construct(GetUserDomainService $getUserDomainService)
    {
        $this->domainService = $getUserDomainService;
    }

    public function getUser()
    {
        return $this->domainService->getUser();
    }
}
