@extends('admin.layout')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                    <li class="breadcrumb-item active">Create Post</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-body">

                <form method="POST" action="{{ route('admin.posts.update', $post) }}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <h4>Titulo</h4>
                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}"
                                placeholder="Ingresa el titulo de la publicación" value="{{old('title', $post->title)}}">
                        </div>

                        <div class="form-group">
                            <h4>Extracto</h4>
                            <input value="{{old('excerpt', $post->excerpt)}}" type="text" name="excerpt" class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : ''}}"
                                placeholder="Ingresa el extracto de la publicación">
                        </div>

                        <div class="form-group">
                            <h4>Contenido de la publicación</h4>
                            <textarea name="body" id="summernote" class="form-control" cols="30" rows="10"
                                placeholder="Ingresa el contenido completo de la publicación">{{old('body', $post->body)}}</textarea>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de publicación</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdate"
                                    data-toggle="datetimepicker">
                                    <input type="date" name="published_at" class="form-control datetimepicker-input"
                                        data-target="#reservationdate" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') : null)}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Categorias</label>
                                <select class="form-control {{ $errors->has('category_id') ? 'is-invalid' : ''}}" name="category_id">
                                    <option value="">Seleccione una Categoria </option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                                        >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group clearfix">
                                <label>Etiquetas</label><br>
                                <select class="select2bs4 {{ $errors->has('tags') ? 'is-invalid' : ''}}" multiple="multiple" name="tags[]"
                                    data-placeholder="Selecciona una o mas etiquetas" style="width: 100%;">
                                    @foreach ($tags as $tag)
                                        <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}  value="{{$tag->id}}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="dropzone">

                            </div>
                            {{-- <div id="actions" class="row">
                                <div class="col-lg-6">
                                <div class="btn-group w-100">
                                    <span class="btn btn-success col fileinput-button">
                                    <i class="fas fa-plus"></i>
                                    <span>Add files</span>
                                    </span>
                                    <button type="submit" class="btn btn-primary col start">
                                    <i class="fas fa-upload"></i>
                                    <span>Start upload</span>
                                    </button>
                                    <button type="reset" class="btn btn-warning col cancel">
                                    <i class="fas fa-times-circle"></i>
                                    <span>Cancel upload</span>
                                    </button>
                                </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center">
                                <div class="fileupload-process w-100">
                                    <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="table table-striped files" id="previews">
                                <div id="template" class="row mt-2">
                                <div class="col-auto">
                                    <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="lead" data-dz-name></span>
                                        (<span data-dz-size></span>)
                                    </p>
                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                    </div>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <div class="btn-group">
                                    <button class="btn btn-primary start">
                                        <i class="fas fa-upload"></i>
                                        <span>Start</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-warning cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Cancel</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-danger delete">
                                        <i class="fas fa-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                    </div>
                                </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('adminlte/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/basic.min.css">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
@endpush

@push('scripts')
<!-- dropzonejs -->
{{-- <script src="{{ asset('adminlte/plugins/dropzone/min/dropzone.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datapicker/locales/bootstrap-datepicker.es.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
{{-- <script>
  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script> --}}

<script>
    var myDropzone = new Dropzone('.dropzone', {
        url: '/admin/posts/{{ $post->url }}/photos',
        acceptedFiles: 'image/*',
        maxFilesize: 2,
        paramName: 'photo',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    $(function () {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
            // Summernote
            $('#summernote').summernote()
        });
        //Obtener error del backend
        myDropzone.on('error', function(file, res){
            var msg = res.errors.photo[0];
            //Mostrar error 
            $('.dz-error-message:last > span').text(msg);
        })
    Dropzone.autoDiscover = false;
</script>
@endpush
