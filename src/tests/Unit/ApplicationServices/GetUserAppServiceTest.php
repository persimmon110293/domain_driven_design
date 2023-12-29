<?php

namespace Tests\Unit\ApplicationServices;

use PHPUnit\Framework\TestCase;
use App\Http\ApplicationService\GetUserAppService;
use App\Http\Domain\DomainServices\GetUserDomainService;
use App\Http\Repositories\IUserRepository;
use App\Http\Domain\Entities\User;

class GetUserAppServiceTest extends TestCase
{
    private $getUserAppService;
    private $userRepositoryMock;
    private $getUserDomainServiceMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->userRepositoryMock = $this->createMock(IUserRepository::class);
        $this->getUserDomainServiceMock = $this->createMock(GetUserDomainService::class);

        $this->getUserAppService = new GetUserAppService($this->getUserDomainServiceMock, $this->userRepositoryMock);
    }

    public function testGetUser(): void
    {
        $userMock = $this->createMock(User::class);
        $this->userRepositoryMock->expects($this->once())
            ->method('getUserById')
            ->with('1')
            ->willReturn($userMock);

        $this->getUserDomainServiceMock->expects($this->once())
            ->method('getUser')
            ->with($userMock)
            ->willReturn($userMock);

        $result = $this->getUserAppService->getUser('1');

        $this->assertEquals($userMock, $result);
    }
}
