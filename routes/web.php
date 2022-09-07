<?php

use App\Http\Controllers\Frontend\Album\AlbumController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::controller(UserController::class)->middleware('guest')->group(function () {

    Route::get('/', 'login')
        ->name('login');

    Route::post('check/login', 'checkLogin')
        ->name('check.login');

    Route::get('/register', 'register')
        ->name('register');

    Route::post('store/user', 'storeData')
        ->name('store.register');

    Route::post('/user/logout', 'logout')
        ->name('user.logout');
});


Route::controller(ProfileController::class)->middleware('auth', 'history')->group(function () {

    Route::get('/profile', 'index')
        ->name('profile');

    Route::put('/profile/update', 'update')
        ->name('profile.update');

    Route::put('/profile/change/password', 'changePassword')
        ->name('profile.change.password');
});




Route::controller(AlbumController::class)->middleware('auth', 'history')->group(function () {

    Route::get('albums', 'index')
        ->name('albums');

    Route::post('store/album', 'store')
        ->name('store.album');

    Route::put('update/{id}/album', 'update')
        ->name('update.album');

    Route::delete('delete/{id}/album', 'destroy')
        ->name('delete.album');

    Route::delete('delete/all/{id}/photos/album', 'deleteAllSubPhotos')
        ->name('delete.all.photos.album');

    Route::put('transport/all/{id}/photos/album', 'transportAllSubPhotosToAlbum')
        ->name('transport.all.photos.album');

    Route::post('store/{id}/sub/photos', 'storeSubPhotos')
        ->name('store.sub.photos');
});
