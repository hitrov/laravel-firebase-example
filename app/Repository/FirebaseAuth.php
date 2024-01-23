<?php

namespace App\Repository;

use App\Repository\Interfaces\Auth as AuthRepository;
use Kreait\Firebase\Auth\SignInResult;
use Kreait\Firebase\Auth\UserRecord;
use Lcobucci\JWT\Token;
use Lcobucci\JWT\UnencryptedToken;
use Stringable;

class FirebaseAuth implements AuthRepository
{
    public function __construct(private readonly \Kreait\Firebase\Contract\Auth $auth)
    {
    }

    public function signInWithEmailAndPassword(
        Stringable|string $email,
        Stringable|string $clearTextPassword
    ): SignInResult {
        return $this->auth->signInWithEmailAndPassword($email, $clearTextPassword);
    }

    public function createUserWithEmailAndPassword(Stringable|string $email, Stringable|string $password): UserRecord
    {
        return $this->auth->createUserWithEmailAndPassword($email, $password);
    }

    public function signInWithRefreshToken(string $refreshToken): SignInResult
    {
        return $this->auth->signInWithRefreshToken($refreshToken);
    }

    public function verifyIdToken(
        Token|string $idToken,
        bool $checkIfRevoked = false,
        ?int $leewayInSeconds = null
    ): UnencryptedToken {
        return $this->auth->verifyIdToken($idToken, $checkIfRevoked, $leewayInSeconds);
    }

    public function getPasswordResetLink(
        Stringable|string $email,
        $actionCodeSettings = null,
        ?string $locale = null
    ): string {
        return $this->auth->getPasswordResetLink($email, $actionCodeSettings, $locale);
    }

    public function changeUserPassword(Stringable|string $uid, Stringable|string $newPassword): UserRecord
    {
        return $this->auth->changeUserPassword($uid, $newPassword);
    }

    public function getUserByEmail(Stringable|string $email): UserRecord
    {
        return $this->auth->getUserByEmail($email);
    }

    public function deleteUser(Stringable|string $uid): void
    {
        $this->auth->deleteUser($uid);
    }

    public function changeUserEmail(Stringable|string $uid, Stringable|string $newEmail): UserRecord
    {
        return $this->auth->changeUserEmail($uid, $newEmail);
    }
}
