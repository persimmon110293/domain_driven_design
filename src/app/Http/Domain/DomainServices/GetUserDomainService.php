<?php

namespace App\Http\Domain\DomainServices;

use App\Http\Domain\Entities\User;

class GetUserDomainService
{
    public function getUser(object $user)
    {
        $user = new User($user);
        return $user;
    }
}
