<?php

namespace App\Http\Controllers\Frontend\Album;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Repositories\Interfaces\iAlbumRepository;
use App\Repositories\Interfaces\iSubPhotosRepository;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    private $albumRepository;
    private $subPhotosRepository;

    public function __construct(iAlbumRepository  $albumRepository, iSubPhotosRepository $subPhotosRepository)
    {
        $this->albumRepository     = $albumRepository;

        $this->subPhotosRepository = $subPhotosRepository;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = $this->albumRepository->getAlbumsUser();

        return view('frontend.user.my_albums', compact('albums'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Album::rules());

        $this->albumRepository->store($request);

        return redirect()->back()->with('success', 'Successfully Created Album :)');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->albumRepository->update($id, $request);

        return redirect()->back()->with('success', 'Successfully Updated Album :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->albumRepository->destroy($id);

        return redirect()->back()->with('success', "Sub-Photos Have Deleted Successfully :) ");
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAllSubPhotos($id)
    {
        $this->subPhotosRepository->deleteAllSubPhotos($id);

        return redirect()->back()->with('success', "Sub-Photos Have Deleted Successfully :) ");
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function transportAllSubPhotosToAlbum(Request $request, $id)
    {
        $this->subPhotosRepository->transportAllSubPhotosToAlbum($request, $id);

        return redirect()->back()->with('success', "Sub-Photos Have Been Moved Successfully :) ");
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeSubPhotos(Request $request , $id)
    {
        return $this->subPhotosRepository->storeSubPhotos($request ,$id);
    }
}
