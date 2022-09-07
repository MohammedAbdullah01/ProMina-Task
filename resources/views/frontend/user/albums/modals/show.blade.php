<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
    data-bs-target="#showAlbum{{ $album->id }}">
    <i class="bi bi-eye-fill"></i>
</button>

<!-- Modal Show Album -->
<div class="modal fade" id="showAlbum{{ $album->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <img src="{{ $album->PictureAlbum }}" height="100px" width="100px" class="img-thumbnail">
                    {{ $album->title }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row ">
                    @forelse ($album->images as $photo)
                        <div class="col-lg-2">

                            <div class="card-header">
                                {{ $photo->created_at->diffForHumans() }}
                            </div>

                            <div class="card mt-3 h-60">
                                <img src="{{ asset('storage/albums/sub_photos/' . $photo->sub_photos) }}"
                                    height="300px">
                            </div>

                            <div class="card-footer text-muted">
                                {{ $photo->name }}
                            </div>

                        </div>
                    @empty
                        <div class="alert alert-danger text-center w-75 m-auto mt-2">
                            {{ 'No Sub Photos :(' }}
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
