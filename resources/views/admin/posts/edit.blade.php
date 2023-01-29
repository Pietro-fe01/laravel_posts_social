@extends('layouts.admin')

@section('content-classes') {{-- add classes to main container @endsection --}} @endsection

@section('content')
    <section id="edit-post">
        <h1>Editing post "{{ $post->title }}"</h1>

        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Post title*</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post image:</label>
                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" onchange="loadFile(event)">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @if ( $post->image )
                    @if ( str_contains($post->image, 'uploads/') )
                        <img id="output" src="{{ asset("storage/$post->image") }}" style="width: 250px; height: 200px" class="mt-3">
                    @else 
                        <img id="output" src="{{ $post->image }}" style="width: 250px; height: 200px" class="mt-3">
                    @endif
                @else
                    <img id="output" style="width: 250px; height: 200px" class="mt-3">
                @endif
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Post description:</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description', $post->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">CREATE</button>
            <button type="reset" class="btn btn-secondary">RESET</button>
        </form>
    </section>
@endsection

<script>
    var loadFile = function(event) {
            if( document.getElementById('output') ) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        }
    };
</script>