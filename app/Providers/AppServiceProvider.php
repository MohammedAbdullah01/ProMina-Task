<?php

namespace App\Providers;

use App\Repositories\Album;
use App\Repositories\Auth;
use App\Repositories\Interfaces\iAlbumRepository;
use App\Repositories\Interfaces\iAuthRepository;
use App\Repositories\Interfaces\iProfileRepository;
use App\Repositories\Interfaces\iSubPhotosRepository;
use App\Repositories\Profile;
use App\Repositories\SubPhotos;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(iAuthRepository::class      , Auth::class);

        $this->app->bind(iProfileRepository::class   , Profile::class);

        $this->app->bind(iAlbumRepository::class     , Album::class);

        $this->app->bind(iSubPhotosRepository::class , SubPhotos::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
