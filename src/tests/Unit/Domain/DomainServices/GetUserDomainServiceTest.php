<?php

namespace Tests\Unit\Domain\DomainServices;

use PHPUnit\Framework\TestCase;
use App\Http\Domain\DomainServices\GetUserDomainService;
use App\Http\Domain\Entities\User;

class GetUserDomainServiceTest extends TestCase
{
    private $getUserDomainService;

    public function setUp(): void
    {
        parent::setUp();

        $this->getUserDomainService = new GetUserDomainService();
    }

    public function testGetUser(): void
    {
        $user = new \stdClass();
        $user->id = '1';
        $user->name = 'Test User';
        $user->email = 'test@example.com';
        $user->password = 'password';

        $result = $this->getUserDomainService->getUser($user);

        $this->assertInstanceOf(User::class, $result);
    }
}
