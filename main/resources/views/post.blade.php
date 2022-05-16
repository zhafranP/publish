
@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-5">{{ $post->title }}</h1>
            <article>
                <p>By : <a class="text-decoration-none"href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a> </p>
                <img class="img-fluid" src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" alt="">
                <p>{!! $post->post !!}</p>
            </article>
            <a class="text-decoration-none" href="/posts">back to post</a>
        </div>
    </div>
</div>
@endsection

