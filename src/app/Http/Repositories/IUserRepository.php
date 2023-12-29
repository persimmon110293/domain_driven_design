<?php

namespace App\Http\Repositories;

use App\Models\User;

interface IUserRepository
{
    public function getUserById(string $id);
    // public function createUser(string $email);
    // public function updateUser(User $user): bool;
    // public function deleteUser(User $user): bool;
}
