<?php

namespace Models;

class UserAccount
{
    private string $name;
    private string $username;
    private string $password;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function createRandomString($length): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    public function createUserName(): string {
        // Generate a unique ID of length 6
        $uniqueId = $this->createRandomString(6);

        return $this->name . $uniqueId;
    }

    public function createPW(): string {
        return $this->createRandomString(13);
    }
}