<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Support\Facades\Request;

interface iAlbumRepository
{
    public function getAlbumsUser();

    public function store($request);

    public function update($id, $request);

    public function destroy($id);
}
