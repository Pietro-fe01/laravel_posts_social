@extends('layouts.admin')

@section('content-classes') bg-dark text-white @endsection

@section('content')
    <section id="show-post" style="position: relative">
        <h1>{{ $post->title }}</h1>

        <img src="{{ $post->image }}" alt="" class="w-25 py-4">

        <div>
            <h5 class="m-0">Description:</h5>
            <p>{{ $post->description }}</p>
        </div>

        <div style="position: absolute; top: 15px; right: 10px;">>Post created: <span class="text-decoration-underline">{{ $post->created_at }}</span></div>
    </section>

@endsection