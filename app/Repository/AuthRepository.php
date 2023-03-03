<?php

namespace App\Repository;

use App\Repository\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class AuthRepository implements AuthRepositoryInterface
{

    public function login($data)
    {
        if (Auth::attempt($data)) {

            // Authentication passed...
            $user = Auth::user();
            session()->put('user', $user);
            return true;
        }

        return false;
    }




    public function register($data)
    {
    }
}
