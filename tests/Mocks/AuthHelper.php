<?php

namespace Tests\Mocks;

use Kreait\Firebase\Auth\UserMetaData;
use Kreait\Firebase\Auth\UserRecord;

class AuthHelper
{
    public static function getUserRecord(string $email = 'user@example.com'): UserRecord
    {
        return new UserRecord(
            uid: '',
            email: $email,
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
