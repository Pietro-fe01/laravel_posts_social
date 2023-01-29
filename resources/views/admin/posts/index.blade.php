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
                    @if ( str_contains($post->image, 'uploads/') )
                        <img src="{{ asset("storage/$post->image") }}" class="pt-3 card-img-top" alt="">
                    @else 
                        <img src="{{ $post->image }}" class="pt-3 card-img-top" alt="">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-decoration-underline">{{ $post->title }}</h5>
                        <p class="card-text description my-4">{{ $post->description }}</p>
                        <a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i> Info</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection