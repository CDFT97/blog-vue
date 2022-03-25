<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form method="POST" action="{{ route('admin.posts.store', '#create') }}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add title for the new post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="post-title" type="text" name="title"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}"
                            placeholder="Ingresa el titulo de la publicación" value="{{old('title')}}" autofocus required >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </div>
            </div>
        </div>
    </form>
</div>