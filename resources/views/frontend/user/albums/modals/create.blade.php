<button type="button" class="btn btn-outline-info btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#createAlbum">
    Create Album
</button>
<!-- Modal Create Album -->
<div class="modal fade" id="createAlbum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Album</h5>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.album') }}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <x-form.input-lable-error lable="Title Album" type="text" name="title"
                        placeholder="Enter Album Name" class="mb-3" />
                    <x-form.input-lable-error lable="Main Photo" type="file" name="picture"
                        placeholder="Enter Album Name" class="mb-3" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-info btn-sm">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
