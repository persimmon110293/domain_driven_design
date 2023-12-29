<?php

namespace Tests\Unit\Http\Translators;

use PHPUnit\Framework\TestCase;
use App\Http\Translators\GetUserTranslator;
use App\Http\Domain\Entities\User;

class GetUserTranslatorTest extends TestCase
{
    private $getUserTranslator;

    public function setUp(): void
    {
        parent::setUp();

        $this->getUserTranslator = new GetUserTranslator();
    }

    public function testTranslate(): void
    {
        $user_param = new \stdClass();
        $user_param->id = '1';
        $user_param->name = 'Test User';
        $user_param->email = 'test@example.com';
        $user_param->password = 'password';

        $user = new User($user_param);

        $expectedResult = [
            'id' => '1',
            'name' => 'Test User',
            'email' => 'test@example.com',
        ];

        $result = $this->getUserTranslator->translate($user);

        $this->assertEquals($expectedResult, $result);
    }
}
