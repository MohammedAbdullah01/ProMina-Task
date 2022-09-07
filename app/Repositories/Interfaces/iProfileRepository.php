<?php

namespace App\Repositories\Interfaces;

interface iProfileRepository
{
    public function Profile();

    public function updateProfile($request);

    public function changePassword($request);
}
