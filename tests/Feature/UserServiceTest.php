<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testSample()
    {
        self::assertTrue(true);
    }

    public function testLoginSucces()
    {
        self::assertTrue($this->userService->login("serius", "bebas1"));
    }

    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login("aimak", "salah"));
    }

    public function testWrongPassword()
    {
        self::assertFalse($this->userService->login("serius", "salah"));
    }
}
