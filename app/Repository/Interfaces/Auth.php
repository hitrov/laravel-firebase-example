<?php

namespace App\Repository\Interfaces;

use Kreait\Firebase\Auth\ActionCodeSettings;
use Kreait\Firebase\Auth\CreateActionLink\FailedToCreateActionLink;
use Kreait\Firebase\Auth\SignIn\FailedToSignIn;
use Kreait\Firebase\Auth\SignInResult;
use Kreait\Firebase\Auth\UserRecord;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Kreait\Firebase\Exception\AuthException;
use Kreait\Firebase\Exception\FirebaseException;
use Lcobucci\JWT\Token;
use Lcobucci\JWT\UnencryptedToken;
use Stringable;

interface Auth
{
    /**
     * @param Stringable|non-empty-string $email
     * @param Stringable|non-empty-string $clearTextPassword
     *
     * @throws FailedToSignIn
     */
    public function signInWithEmailAndPassword(Stringable|string $email, Stringable|string $clearTextPassword): SignInResult;

    /**
     * @param Stringable|non-empty-string $email
     * @param Stringable|non-empty-string $password
     *
     * @throws AuthException
     * @throws FirebaseException
     */
    public function createUserWithEmailAndPassword(Stringable|string $email, Stringable|string $password): UserRecord;

    /**
     * @param non-empty-string $refreshToken
     *
     * @throws FailedToSignIn
     */
    public function signInWithRefreshToken(string $refreshToken): SignInResult;

    /**
     * Verifies a JWT auth token.
     *
     * Returns a token with the token's claims or rejects it if the token could not be verified.
     *
     * If checkRevoked is set to true, verifies if the session corresponding to the ID token was revoked.
     * If the corresponding user's session was invalidated, a RevokedIdToken exception is thrown.
     * If not specified the check is not applied.
     *
     * NOTE: Allowing time inconsistencies might impose a security risk. Do this only when you are not able
     * to fix your environment's time to be consistent with Google's servers.
     *
     * @param Token|non-empty-string $idToken the JWT to verify
     * @param bool $checkIfRevoked whether to check if the ID token is revoked
     * @param positive-int|null $leewayInSeconds number of seconds to allow a token to be expired, in case that there
     *                                           is a clock skew between the signing and the verifying server
     *
     * @throws FailedToVerifyToken if the token could not be verified
     * @throws RevokedIdToken if the token has been revoked
     */
    public function verifyIdToken(Token|string $idToken, bool $checkIfRevoked = false, ?int $leewayInSeconds = null): UnencryptedToken;

    /**
     * @param Stringable|non-empty-string $email
     * @param ActionCodeSettings|array<non-empty-string, mixed>|null $actionCodeSettings
     * @param non-empty-string|null $locale
     *
     * @throws FailedToCreateActionLink
     */
    public function getPasswordResetLink(Stringable|string $email, $actionCodeSettings = null, ?string $locale = null): string;

    /**
     * @param Stringable|non-empty-string $uid
     * @param Stringable|non-empty-string $newPassword
     *
     * @throws AuthException
     * @throws FirebaseException
     */
    public function changeUserPassword(Stringable|string $uid, Stringable|string $newPassword): UserRecord;

    /**
     * @param Stringable|non-empty-string $email
     *
     * @throws UserNotFound
     * @throws AuthException
     * @throws FirebaseException
     */
    public function getUserByEmail(Stringable|string $email): UserRecord;

    /**
     * @param Stringable|non-empty-string $uid
     *
     * @throws UserNotFound
     * @throws AuthException
     * @throws FirebaseException
     */
    public function deleteUser(Stringable|string $uid): void;

    /**
     * @param Stringable|non-empty-string $uid
     * @param Stringable|non-empty-string $newEmail
     *
     * @throws AuthException
     * @throws FirebaseException
     */
    public function changeUserEmail(Stringable|string $uid, Stringable|string $newEmail): UserRecord;
}
