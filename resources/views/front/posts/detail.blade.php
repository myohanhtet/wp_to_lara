@extends('front.layouts.master')

@section('title', $post->formatted_title )

@section('content')

    @auth
        <div class="pb-4">
            <a class="button" target="_blank" href="{{ action('Back\PostsController@edit', $post->id) }}">Edit</a>
        </div>
    @endauth

    <h1>{{ $post->formatted_title }}</h1>

    <div class="text-grey-darker text-sm pb-6 border-b text-grey">
        Posted on <time datetime="{{ $post->publish_date->format(DateTime::ATOM) }}">{{ $post->publish_date }}</time> | {{ $post->author }}
    </div>

    <div class="pt-4 post-content">
        {!! $post->text !!}
    </div>


@endsection
