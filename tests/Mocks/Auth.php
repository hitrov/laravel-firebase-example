<?php

namespace Tests\Mocks;

use Kreait\Firebase\Auth\SignInResult;
use Kreait\Firebase\Auth\UserMetaData;
use Kreait\Firebase\Auth\UserRecord;
use Lcobucci\JWT\Token;
use Lcobucci\JWT\UnencryptedToken;
use Stringable;

class Auth implements \App\Repository\Interfaces\Auth
{

    public function signInWithEmailAndPassword(
        Stringable|string $email,
        Stringable|string $clearTextPassword
    ): SignInResult {
        return SignInResult::fromData([]);
    }

    public function createUserWithEmailAndPassword(Stringable|string $email, Stringable|string $password): UserRecord
    {
        return self::getUserRecord();
    }

    public function signInWithRefreshToken(string $refreshToken): SignInResult
    {
        return SignInResult::fromData([]);
    }

    public function verifyIdToken(
        Token|string $idToken,
        bool $checkIfRevoked = false,
        ?int $leewayInSeconds = null
    ): UnencryptedToken {
        // TODO: Implement verifyIdToken() method.
    }

    public function getPasswordResetLink(
        Stringable|string $email,
        $actionCodeSettings = null,
        ?string $locale = null
    ): string {
        return '';
    }

    public function changeUserPassword(Stringable|string $uid, Stringable|string $newPassword): UserRecord
    {
        return self::getUserRecord();
    }

    public function getUserByEmail(Stringable|string $email): UserRecord
    {
        return self::getUserRecord();
    }

    public function deleteUser(Stringable|string $uid): void
    {
    }

    public function changeUserEmail(Stringable|string $uid, Stringable|string $newEmail): UserRecord
    {
        return self::getUserRecord();
    }

    public static function getUserRecord(): UserRecord
    {
        return new UserRecord(
            uid: '',
            email: null,
            emailVerified: false,
            displayName: null,
            phoneNumber: null,
            photoUrl: null,
            disabled: false,
            metadata: new UserMetaData(
                createdAt: new \DateTimeImmutable(),
                lastLoginAt: null,
                passwordUpdatedAt: null,
                lastRefreshAt: null,
            ),
            providerData: [],
            mfaInfo: null,
            passwordHash: null,
            passwordSalt: null,
            customClaims: [],
            tenantId: null,
            tokensValidAfterTime: null,
        );
    }
}
