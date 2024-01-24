<?php

namespace Tests\Feature;

use Kreait\Firebase\Contract\Auth;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\Mocks\AuthHelper;
use Tests\TestCase;

class AuthTest extends TestCase
{
    private Auth|MockObject $auth;

    protected function setUp(): void
    {
        parent::setUp();

        $this->auth = $this->createMock(Auth::class);
    }

    public function testGetUserByEmail(): void
    {
        $this->auth->expects($this->once())->method('getUserByEmail')
            ->willReturn(AuthHelper::getUserRecord());

        $this->auth->getUserByEmail('');
    }

    public function testChangeUserEmail(): void
    {
        $this->auth->expects($this->once())
            ->method('changeUserEmail')
            ->willReturn(AuthHelper::getUserRecord());

        $this->auth->changeUserEmail('', '');
    }

    public function testCreateUserWithEmailAndPassword(): void
    {
        $this->auth->expects($this->once())
            ->method('createUserWithEmailAndPassword')
            ->willReturn(AuthHelper::getUserRecord());

        $this->auth->createUserWithEmailAndPassword('', '');
    }
}
