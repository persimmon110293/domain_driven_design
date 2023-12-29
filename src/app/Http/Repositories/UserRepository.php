<?php

namespace App\Http\Repositories;

use App\Http\Repositories\IUserRepository;
use Illuminate\Support\Facades\DB;

class UserRepository implements IUserRepository
{
    public function getUserById(string $id)
    {
        return DB::table('users')
                ->where('id', $id)
                ->first();
    }
}
