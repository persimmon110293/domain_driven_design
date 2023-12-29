<?php

namespace Tests\Unit\Http\Translators;

use PHPUnit\Framework\TestCase;
use App\Http\Translators\GetUserTranslator;

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
        $user = new \stdClass();
        $user->id = '1';
        $user->name = 'Test User';
        $user->email = 'test@example.com';

        $expectedResult = [
            'id' => '1',
            'name' => 'Test User',
            'email' => 'test@example.com',
        ];

        $result = $this->getUserTranslator->translate($user);

        $this->assertEquals($expectedResult, $result);
    }
}
