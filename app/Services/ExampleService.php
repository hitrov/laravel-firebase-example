<?php

namespace App\Services;

use App\Repository\Interfaces\Auth;

class ExampleService
{
    public function __construct(private readonly Auth $auth)
    {
    }

    public function execute(): void
    {
        $this->auth->getUserByEmail('user@example.com');
    }
}
