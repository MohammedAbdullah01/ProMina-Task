<!-- Button trigger modal -->
<button type="button" class="btn-sm btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#createSubPhotos{{$album->id}}">
    Add Sub Photos
</button>

<!-- Modal Add Sub Photos -->
<div class="modal fade" id="createSubPhotos{{$album->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-secondary">
            <div class="modal-header">
                <h5 class="modal-title " id="staticBackdropLabel">Create Sub Photos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('store.sub.photos' , $album->id)}}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <x-form.input-lable-error lable="Sub Photos" type="file"  name="sub_photos[]" multiple  />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark btn-sm"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
