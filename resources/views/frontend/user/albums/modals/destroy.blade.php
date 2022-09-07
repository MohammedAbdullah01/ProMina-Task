@if ($album->images->count() > 0)
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-danger btn-sm mb-2" data-bs-toggle="modal"
        data-bs-target="#openModal{{ $album->id }}">
        <i class="bi bi-trash"></i>
    </button>

    <!-- Modal Optional [ Delete All Sub Photos || Transfer Sub Photos To Album ] -->
    <div class="modal fade" id="openModal{{ $album->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Optional</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-grid gap-2 col-8 mx-auto">

                        <!-- Button trigger modal Delete All Sub Photos -->
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#deleteAllSubPhotos{{ $album->id }}">
                            {{ 'Delete All The Sub Photos In The Album' }}
                        </button>


                        <!-- Button trigger modal Transfer Photos To Album -->
                        <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                            data-bs-target="#transferPhotosToAlbum{{ $album->id }}">
                            {{ 'Transfer Sub Photos To Another Album' }}
                        </button>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete All Sub Photos -->
    <div class="modal fade" id="deleteAllSubPhotos{{ $album->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete All Sub Photos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('delete.all.photos.album', $album->id) }}" method="post">
                        <input type="hidden" value="{{ $album->id }}">
                        @method('DELETE')
                        @csrf
                        <div class="alert alert-danger text-center m-auto">
                            {{ "Do you Want To Delete All Sub-Photos From The Album Of [ $album->title ] ?" }}
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark btn-sm"
                                data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-outline-danger btn-sm" type="submit">Yes Of Course</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Transfer Sub Photos To Album -->
    <div class="modal fade" id="transferPhotosToAlbum{{ $album->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ 'You Must Choose The Album You Want To Transfer The Sub Photos To' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('transport.all.photos.album', $album) }}" method="post">
                        @method('PUT')
                        @csrf

                        <label for="recipient-name" class="form-label">
                            {{ __('Albums') }}
                        </label>

                        <select class="form-control mb-3" name="album_id" aria-label="Default select example">
                            <option value="" selected>
                                {{ __('Choose Album') }}
                            </option>
                            @forelse ($albums as $album)
                                <option value="{{ $album->id }}">
                                    {{ $album->title }}
                                </option>
                            @empty
                                <option>
                                    {{ 'No Album Available :(' }}
                                </option>
                            @endforelse

                            @error('album_id')
                                <span class="text-danger" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </select>
                        <div class="alert alert-warning bt-4">
                            {{ 'Do You Want To Transfer The Sub Photos To Another Album ? :)' }}
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark btn-sm"
                                data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-outline-success btn-sm" type="submit">Yes Of Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-danger btn-sm mb-2" data-bs-toggle="modal"
        data-bs-target="#deleteAlbum{{ $album->id }}">
        <i class="bi bi-trash"></i>
    </button>

    <!-- Modal Delete Album -->
    <div class="modal fade" id="deleteAlbum{{ $album->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('delete.album', $album->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="alert alert-danger">
                            {{ ' Do you want to delete the album permanently ?  :(' }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark btn-sm"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-danger btn-sm">Yes Of Course </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
