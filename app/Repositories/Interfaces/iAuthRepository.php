<?php

namespace App\Repositories\Interfaces;


interface iAuthRepository
{
    public function checkLogin($request);

    public function storeDataRegister($request);

    public function logout($request);
}
