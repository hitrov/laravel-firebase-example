<?php

namespace Tests\Feature;

use App\Services\ExampleService;
use PHPUnit\Framework\TestCase;

class ExampleServiceTest extends TestCase
{
    public function testGetUserByEmailCalled(): void
    {
        $auth = $this->createMock(\Tests\Mocks\Auth::class);

        $service = new ExampleService($auth);

        $auth->expects($this->once())->method('getUserByEmail');

        $service->execute();
    }
}
