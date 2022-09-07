<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\iAuthRepository;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Auth implements iAuthRepository
{
    private $ModelUser;

    public function __construct(User $ModelUser)
    {
        $this->ModelUser = $ModelUser;
    }

    public function checkLogin($request)
    {
        $request->validate([
            'email' => "required|email|string|exists:users,email",
            'password' => 'required|string',
        ]);

        $user = $request->only(['email', 'password']);

        if (FacadesAuth::guard('web')->attempt($user)) {

            $name = FacadesAuth::guard('web')->user()->slug;

            return redirect()->route('profile')->with('success', "Dear Sir Welcome::  $name ");
        } else {

            return redirect()->back()->with('error', 'Incorrect Password');
        }
    }


    public function storeDataRegister($request)
    {
        $request->validate([
            'name'     => "required|string|between:4,20",
            'email'    => "required|email|string",
            'password' => 'required|string|min:5|confirmed',
        ]);

        $this->ModelUser::create([

            'name'     => $request->post('name'),
            'slug'     => Str::slug($request->post('name')),
            'email'    => $request->post('email'),
            'password' => Hash::make($request->post('password'))

        ]);
    }

    public function logout($request)
    {
        FacadesAuth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
