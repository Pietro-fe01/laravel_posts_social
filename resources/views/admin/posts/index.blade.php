@extends('layouts.admin')

@section('content-classes') {{-- add classes to main container @endsection --}} @endsection

@section('content')
    <section id="index-post">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="py-3">Posts List</h1>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Create new post</a>
        </div>
        <div class="d-flex flex-wrap">
            @foreach ($posts as $post)
                <div class="card mb-4 text-center">
                    @if ( $post->image )
                        @if ( str_contains($post->image, 'uploads/') )
                            <img src="{{ asset("storage/$post->image") }}" class="pt-3 card-img-top" alt="post_image">
                        @else 
                            <img src="{{ $post->image }}" class="pt-3 card-img-top" alt="post_image">
                        @endif
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-decoration-underline">{{ $post->title }}</h5>
                        <p class="card-text description my-4">{{ $post->description }}</p>
                        <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i> Info</a>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#post_model{{ $post->id }}">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="post_model{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Deleting {{ $post->title }} </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-danger">
                                        Deleting Record ID {{ $post->id }}, are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection