@extends('layouts.main')

@section('container')

    <h1 class="mb-5">Post Category : {{  $title }}</h1>
    @foreach ($posts as $post)
    <article class='mb-5 border-bottom'>
        <h2><a class="text-decoration-none" href="/posts/{{ $post['slug'] }}">{{ $post['title'] }}</a></h2>
        <h5>by : <a class="text-decoration-none" href="/authors/{{ $post->user->username }}">{{ $post->user->name }}</a></h5> 
        <p>{{ $post['excerpt'] }}</p>
        <a href="/posts/{{ $post['slug'] }}">Read more...</a>
    </article>
    @endforeach

@endsection

