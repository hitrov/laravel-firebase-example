<?php

namespace Tests\Feature;

use App\Repository\Interfaces\Auth;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class FirebaseAuthTest extends TestCase
{
    private Auth|MockObject $auth;

    protected function setUp(): void
    {
        parent::setUp();

        $this->auth = $this->createMock(Auth::class);
    }

    public function testGetUserByEmail(): void
    {
        $this->auth->method('getUserByEmail')
            ->willReturn(\Tests\Mocks\Auth::getUserRecord());

        $this->auth->expects($this->once())->method('getUserByEmail');

        $this->auth->getUserByEmail('');
    }

    public function testChangeUserEmail(): void
    {
        $this->auth->method('changeUserEmail')
            ->willReturn(\Tests\Mocks\Auth::getUserRecord());

        $this->auth->expects($this->once())->method('changeUserEmail');

        $this->auth->changeUserEmail('', '');
    }

    public function testCreateUserWithEmailAndPassword(): void
    {
        $this->auth->method('createUserWithEmailAndPassword')
            ->willReturn(\Tests\Mocks\Auth::getUserRecord());

        $this->auth->expects($this->once())->method('createUserWithEmailAndPassword');

        $this->auth->createUserWithEmailAndPassword('', '');
    }
}
