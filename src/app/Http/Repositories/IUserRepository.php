<?php

namespace App\Http\Repositories;

use App\Models\User;

interface IUserRepository
{
    // public function getUserById(int $id): ?User;
    public function createUser(string $email);
    // public function updateUser(User $user): bool;
    // public function deleteUser(User $user): bool;
}
