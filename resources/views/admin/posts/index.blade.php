@extends('layouts.admin')

@section('content')
    <section id="index-post">
        <h1 class="py-3">Posts List</h1>
        <div class="d-flex flex-wrap">
            @foreach ($posts as $post)
                <div class="card mb-4 text-center">
                    <img src="{{ $post->image }}" class="pt-3 w-25 card-img-top" alt="">
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