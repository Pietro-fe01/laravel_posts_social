@extends('layouts.admin')

@section('content-classes') {{-- add classes to main container @endsection --}} @endsection

@section('content')
    <section id="create-post">
        <h1>Creating new post</h1>

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Post title*</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post image:</label>
                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" onchange="getImgPreview(event)">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <img id="output" src="" class="mt-3">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Post description:</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">CREATE</button>
            <button type="reset" class="btn btn-secondary">RESET</button>
        </form>
    </section>

    <script>
        const inputImage = document.getElementById('image'); // form input file
        const image = document.getElementById('output'); // image output preview

        window.onload = function() {
            if( inputImage.files.length == 0) {
                image.classList.add('d-none');
            }
        }
    
        function getImgPreview(event){
            if( inputImage.files.length ) {
                image.classList.remove('d-none');
                image.classList.add('d-block');
                loadFile(event);
            }
        };
    
        var loadFile = function(event) {
            var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
