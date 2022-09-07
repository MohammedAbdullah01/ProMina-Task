<?php

namespace App\Repositories;

use App\Models\Album as ModelsAlbum;
use App\Repositories\Interfaces\iAlbumRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Album  implements iAlbumRepository
{
    private $album;

    public function __construct(ModelsAlbum $album)
    {
        $this->album = $album;
    }

    public function getAlbumsUser()
    {
        $albums = $this->album::with('user', 'images')->withCount('images')->latest()->paginate();
        return $albums;
    }

    public function store($request)
    {
        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {

            $name_main_picture = time() . '_' . $request->title . '.' . $request->picture->extension();
            $move_main_picture = $request->picture->storeAs('albums/', $name_main_picture, 'public');
            $this->album::create([
                'title'     => $request->post('title'),
                'user_id'   => Auth::id(),
                'picture'   => $name_main_picture,

            ]);
        }
    }

    public function update($id, $request)
    {
        $album  = $this->album::findOrFail($id);

        $album->update([
            'title'     => $request->post('title'),
            'user_id'   => Auth::id(),
        ]);

        if ($request->hasFile('picture')) {

            $search_path_sub_picture = public_path('storage/albums/' . $album->picture);

            if (File::exists($search_path_sub_picture)) {
                File::delete($search_path_sub_picture);
            }

            $name_main_picture = time() . '_' . $request->title . '.' . $request->picture->extension();
            $move_main_picture = $request->picture->storeAs('albums/', $name_main_picture, 'public');

            $album->update([
                'picture'   => $name_main_picture,
            ]);
        }
    }


    public function destroy($id)
    {
        $album = $this->album     ::with('images')->findOrFail($id);
        $search_path_sub_picture = public_path('storage/albums/' . $album->picture);

        if (File::exists($search_path_sub_picture)) {
            File::delete($search_path_sub_picture);
            $album->forceDelete();
        }
    }

}
