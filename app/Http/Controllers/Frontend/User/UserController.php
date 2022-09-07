<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\iAuthRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $authRepo;

    public function __construct(iAuthRepository $authRepo)
    {
        $this->authRepo = $authRepo;
    }
    public function login()
    {
        return view('Auth.login');
    }

    public function checkLogin(Request $request)
    {
        return $this->authRepo->checkLogin($request);
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function storeData(Request $request)
    {
        $this->authRepo->storeDataRegister($request);

        return redirect()->route('login')->with('success', "Data Was Successfully Recorded ");
    }

    public function logout(Request $request)
    {
        return  $this->authRepo->logout($request);
    }
}
