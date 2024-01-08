<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Controllers\GetUserController;
use App\Http\ApplicationService\IGetUserAppService;
use App\Http\Translators\GetUserTranslator;
use App\Http\Domain\Entities\User;
use stdClass;
use Exception;
use App\Exceptions\UserNotFoundException;

class GetUserControllerTest extends TestCase
{
    private $appServiceMock;
    private $translatorMock;
    private $user;

    public function setUp(): void
    {
        parent::setUp();

        // make mocks
        $this->appServiceMock = $this->createMock(IGetUserAppService::class);
        $this->translatorMock = $this->createMock(GetUserTranslator::class);

        // make User object
        $user_param = new stdClass();
        $user_param->id = 1;
        $user_param->name = 'test';
        $user_param->email = 'test@example.com';
        $user_param->password = 'password';

        $this->user = new User($user_param);
    }

    public function testInvokeWithValidId(): void
    {
        // make necessary objects
        $request = new Request();
        $request->query->set('id', 1);

        // make necessary array
        $expected_param = [
            'id' => 1,
            'name' => 'test',
            'email' => 'test@example.com',
        ];

        // set parameters for mocks
        $this->appServiceMock->expects($this->once())
            ->method('getUser')
            ->with('1')
            ->willReturn($this->user);

        $this->translatorMock->expects($this->once())
            ->method('translate')
            ->with($this->equalTo($this->user))
            ->willReturn($expected_param);

        // run test
        $controller = new GetUserController($this->appServiceMock, $this->translatorMock);
        $response = $controller->__invoke($request);

        $this->assertEquals($expected_param, $response);
    }

    public function testInvokeWithInvalidId(): void
    {
        // make necessary objects
        $request = new Request();
        $request->query->set('id', 1);

        // set parameters for mocks
        $this->appServiceMock->method('getUser')
            ->with('-1')
            ->willThrowException(new UserNotFoundException());

        // run test
        $controller = new GetUserController($this->appServiceMock, $this->translatorMock);
        $result = $controller->__invoke($request);

        $this->assertEquals(500, $result->getStatusCode());
    }
}
