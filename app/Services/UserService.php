<?php

namespace App\Services;


class UserService
{
    private array $users = [
        'serius' => 'bebas1'
    ];

    public function login(string $user, string $password): bool
    {
        if (!isset($this->users[$user])) {
            return false;
        }

        $correctPassword = $this->users[$user];
        return $password == $correctPassword;
        if ($password == $correctPassword) {
            return true;
        } else {
            return false;
        }
    }
}
