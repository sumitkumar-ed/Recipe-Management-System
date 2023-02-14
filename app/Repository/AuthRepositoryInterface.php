<?php
namespace App\Repository;

interface AuthRepositoryInterface{
    public function login($logindata);

    public function register($data);
}


?>