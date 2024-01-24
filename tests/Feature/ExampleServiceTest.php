<?php

namespace Tests\Feature;

use App\Services\ExampleService;
use Kreait\Firebase\Contract\Auth;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Tests\Mocks\AuthHelper;

class ExampleServiceTest extends TestCase
{
    public function testGetUserByEmailCalled(): void
    {
        /** @var Auth|MockObject $auth */
        $auth = $this->createMock(Auth::class);

        $email = 'user@example.com';
        $auth->expects($this->once())
            ->method('getUserByEmail')
            ->with($email)
            ->willReturn(AuthHelper::getUserRecord($email));

        $service = new ExampleService($auth);

        $userRecord = $service->execute($email);
        $this->assertEquals($email, $userRecord->email);
    }
}
