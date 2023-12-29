<?php

namespace App\Http\Domain\Entities;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct(object $user)
    {
        $this->setId($user->id);
        $this->setName($user->name);
        $this->setEmail($user->email);
        $this->setPassword($user->password);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    private function setId(string $id): void
    {
        $this->id = $id;
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
