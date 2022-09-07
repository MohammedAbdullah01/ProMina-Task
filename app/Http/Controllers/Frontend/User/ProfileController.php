<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\iProfileRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $profileRepo;

    public function __construct(iProfileRepository $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->profileRepo->profile();
    }

    public function update(Request $request)
    {
        $this->profileRepo->updateProfile($request);

        return redirect()->back()->with('success', 'Successfully Updated Profile');
    }

    public function changePassword(Request $request)
    {
        return $this->profileRepo->changePassword($request);
    }
}
