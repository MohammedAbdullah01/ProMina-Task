<?php

namespace App\Repositories;

use App\Models\Album;
use App\Models\Picture;
use App\Repositories\Interfaces\iSubPhotosRepository;
use Illuminate\Support\Facades\File;

class SubPhotos implements iSubPhotosRepository
{
    private $picture;
    private $album;
    public function __construct(Picture $picture, Album $album)
    {
        $this->picture = $picture;
        $this->album   = $album;
    }

    public function storeSubPhotos($request, $id)
    {
        $request->validate([
            'sub_photos.*' => 'image|mimes:jpeg,png,jpg|max:5048|dimensions:max_width=1500,max_height=1500'
        ]);

        $storePhotos = $this->album::findOrFail($id);

        if ($request->hasFile('sub_photos')) {
            $files = $request->file('sub_photos');

            foreach ($files as $file) {

                $name_sub_picture =  time() . '_' . $file->getClientOriginalName();

                $storePhotos->images()->create(
                    [
                        'name'       => $file->getClientOriginalName(),
                        'sub_photos' => $name_sub_picture,
                        'album_id' => $request->album
                    ]
                );
                $move_sub_picture = $file->storeAs('albums/sub_photos', $name_sub_picture, 'public');
                return redirect()->back()->with('success', "Successfully Added Sub Photos :) ");
            }

        } else {
            return redirect()->back()->with('error', "Sub Photos field is required  :( ");
        }
    }

    public function transportAllSubPhotosToAlbum($request, $id)
    {
        $request->validate([
            'album_id' => 'required|numeric|exists:albums,id'
        ]);

        $subPhotos = $this->album::with('images')->findOrFail($id);

        if ($request->post('album_id') === $id) {
            return redirect()->back()->with('info', 'The Sub Photos Are Already Inside The Chosen Album');
        }

        foreach ($subPhotos->images as $photo) {
            $photo->update([
                'album_id' => $request->post('album_id')
            ]);
        }
    }

    public function deleteAllSubPhotos($id)
    {
        $subPhotos = Album::with('images')->findOrFail($id);
        foreach ($subPhotos->images as $image) {
            $search_path_sub_picture = public_path('storage/albums/sub_photos/' . $image->sub_photos);

            if (File::exists($search_path_sub_picture)) {
                File::delete($search_path_sub_picture);
                $image->forceDelete();
            }
        }
    }
}
