<?php
namespace App\Repository;

interface AuthRepositoryInterface{
    public function login($data);

    public function register($data);
}


?>