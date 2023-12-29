<?php

namespace App\Http\Translators;

class GetUserTranslator
{
    public function translate(object $user)
    {
        $user = [
            'id' => $user->id(),
            'name' => $user->name(),
            'email' => $user->email(),
        ];

        return $user;
    }
}
