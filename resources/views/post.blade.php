@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <h1 class= "md-3" >{{ $post->title }}</h1>
            <p>By : <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}"> {{ $post->category->name   }}</a></p>
            

            @if ($post->image)
            <div style="max-height: 350px; overflow:hidden">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
            class="img-fluid mt-3">
            </div>
            
            @else
            <img src="https://source.unsplash.com/random/1200×400?{{ $post->category->name }}"
            class="img-fluid mt-3" alt={{ $post->category->name }}>
            @endif
            
            class="card-img-top" alt={{ $post->category->name }}>
            <article class="my-3 fs-5">
            {!! $post->body !!}
            </article>

                <a href="/posts">Back To Posts</a>
            </div>
        </div>
    </div>




@endsection