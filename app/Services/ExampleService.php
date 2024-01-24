<?php

namespace App\Services;

use Kreait\Firebase\Auth\UserRecord;
use Kreait\Firebase\Contract\Auth;

class ExampleService
{
    public function __construct(private readonly Auth $auth)
    {
    }

    public function execute(string $input): UserRecord
    {
        return $this->auth->getUserByEmail($input);
    }
}
