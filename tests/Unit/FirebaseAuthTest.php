<?php

namespace Tests\Unit;

use Kreait\Firebase\Auth\UserRecord;
use Kreait\Firebase\Contract\Auth;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

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
        $this->auth->expects($this->once())->method('getUserByEmail');

        $this->auth->method('getUserByEmail')
            ->willReturn($this->getUserRecord());

        $this->auth->getUserByEmail('');
    }

    public function testChangeUserEmail(): void
    {
        $this->auth->expects($this->once())->method('changeUserEmail');

        $this->auth->method('changeUserEmail')
            ->willReturn($this->getUserRecord());

        $this->auth->changeUserEmail('', '');
    }

    public function testCreateUserWithEmailAndPassword(): void
    {
        $this->auth->expects($this->once())->method('createUserWithEmailAndPassword');

        $this->auth->method('createUserWithEmailAndPassword')
            ->willReturn($this->getUserRecord());

        $this->auth->createUserWithEmailAndPassword('', '');
    }

    private function getUserRecord(): UserRecord
    {
        return UserRecord::fromResponseData([
            'localId' => 'foo',
            'rawId' => 'bar',
            'providerId' => 'baz',
            'createdAt' => (string) now(),
        ]);
    }
}
