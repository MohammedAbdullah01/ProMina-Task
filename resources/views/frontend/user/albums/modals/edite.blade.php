<button type="button" class="btn btn-outline-info btn-sm mb-2" data-bs-toggle="modal"
    data-bs-target="#editAlbum{{ $album->id }}">
    <i class="bi bi-pencil-square"></i>
</button>

<!-- Modal Edit Album -->
<div class="modal fade" id="editAlbum{{ $album->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Album</h5>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.album', $album->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <x-form.input-lable-error lable="Title Album" type="text" name="title"
                        placeholder="Enter Album Name" :value="$album->title" class="mb-3" />
                    <img src="{{ $album->PictureAlbum }}" class="img-thumbnail">

                    <x-form.input-lable-error lable="Main Photo" type="file" name="picture"
                        placeholder="Enter Album Name" class="mb-3" />



                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark btn-sm"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-success btn-sm">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
