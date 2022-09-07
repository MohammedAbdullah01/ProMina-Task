<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\iProfileRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Profile implements iProfileRepository
{
    private $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::id());

        return view('frontend.profile', compact('user'));
    }

    public function updateProfile($request)
    {
        $userId =  Auth::id();

        $request->validate([
            'name'  => 'required|min:3|max:20|string',
            'email' => "required|email|string|unique:users,email,$userId",
            'phone' => 'nullable|string',
            'about' => 'required|between:10,255',
        ]);

        $user = $this->userModel::findOrFail($userId);

        $user->update([

            'name'     => $request->post('name'),
            'slug'     => Str::slug($request->post('name')),
            'phone'    => $request->post('phone'),
            'about'    => $request->post('about')
        ]);

        $this->uploadPhoto($request, $user);
    }


    public function changePassword($request)
    {
        $request->validate([
            'old_password' => 'required|string|min:5|max:30',
            'password' => 'required|string|min:5|max:30|confirmed',
            'password_confirmation' => 'required|string'
        ]);

        $user = $this->userModel::findOrFail(Auth::id());
        if (Hash::check($request->post('old_password'), $user->password)) {

            $user->password = Hash::make($request->post('password'));
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('success', 'Successfully Changed Password');
        } else {

            return redirect()->back()->with('error', 'The Old Password Is Incorrect');
        }
    }


    protected function uploadPhoto($request, $object)
    {
        $request->validate([
            'avatar'   => 'nullable|mimes:png,jpg,jpeng|image',
        ]);
        if ($request->hasFile('avatar')) {
            $path_photo = public_path("storage/user/" . $object->avatar);
            if (File::exists($path_photo)) {
                File::delete($path_photo);
            }
            $name_photo = time() . '_' . $request->name . '.' . $request->avatar->extension();
            $path_upload = $request->avatar->storeAs("user/", $name_photo, 'public');
            $object->update([
                'avatar' => $name_photo,
            ]);
        }
    }


}

//
