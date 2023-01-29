@extends('layouts.admin')

@section('content-classes') bg-dark text-white @endsection

@section('content')
    <section id="show-post" style="position: relative">
        <h1>{{ $post->title }}</h1>

        <div class="my-3">
            @if ( str_contains($post->image, 'uploads/') )
                <img src="{{ asset("storage/$post->image") }}" class="pt-3 card-img-top w-25" alt="">
            @else 
                <img src="{{ $post->image }}" class="pt-3 card-img-top w-25" alt="">
            @endif
        </div>

        <div>
            <h5 class="m-0">Description:</h5>
            <p>{{ $post->description }}</p>
        </div>

        <div style="position: absolute; top: 15px; right: 10px;">>Post created: <span class="text-decoration-underline">{{ $post->created_at }}</span></div>
    </section>
@endsection