<?php

namespace Tests\Unit\Domain\Entities;

use PHPUnit\Framework\TestCase;
use App\Http\Domain\Entities\User;

class UserTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $user = new \stdClass();
        $user->id = '1';
        $user->name = 'Test User';
        $user->email = 'test@example.com';
        $user->password = 'password';

        $this->user = new User($user);
    }

    public function testId(): void
    {
        $this->assertEquals('1', $this->user->id());
    }

    public function testName(): void
    {
        $this->assertEquals('Test User', $this->user->name());
    }

    public function testEmail(): void
    {
        $this->assertEquals('test@example.com', $this->user->email());
    }

    public function testPassword(): void
    {
        $this->assertEquals('password', $this->user->password());
    }
}
