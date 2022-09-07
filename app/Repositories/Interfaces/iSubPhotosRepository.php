<?php

namespace App\Repositories\Interfaces;

interface iSubPhotosRepository
{
    public function storeSubPhotos($request ,$id);

    public function transportAllSubPhotosToAlbum($request, $id);

    public function deleteAllSubPhotos($id);
}
