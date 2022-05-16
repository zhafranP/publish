{{-- @dd($posts) --}}

@extends('layouts.main')



@section('container')
    <h1 class="mb-3">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts" method="get">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>
    @if ($posts->count())
    <div class="card mb-3">
        <img src="https://source.unsplash.com/1600x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
        <div class="card-body text-center">
        <h3 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
        <small>
            <p>By: <a class="text-decoration-none" href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> </p>
        </small>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a class="text-decoration-none btn btn-primary" href="/posts?category={{ $posts[0]->slug }}">Read more...</a>
        <p class="card-text"><small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small></p>
        </div>
    </div>

    
    <div class="container ">
        <div class="row g-4 mb-5">
            @foreach ($posts->skip(1) as $post)

            <div class="col-md-4 ">

                <div class="card" >
                    <div class="position-absolute px-3 py-1 " style="background-color: rgba(0, 0, 0, 0.7)"><a class="text-white text-decoration-none" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                    <img src="https://source.unsplash.com/1400x900?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <small>
                            <p>By: <a class="text-decoration-none" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a> </p>
                        </small>
                        <p class="card-text">{{ $post['excerpt'] }}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                        <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{ $posts->links() }}
    
    @else 
        <p class="text-center fs-4">No Posts Found</p>
    @endif
    @endsection

    