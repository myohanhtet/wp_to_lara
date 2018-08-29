@extends('back.layouts.master')

@section('content')
	@foreach($posts as $post)
            <div class="flex justify-between items-start px-6 py-2 border-b border-grey-lighter">
                <div>
                    <div>
                        <a href="{{ action('Back\PostsController@edit', $post->id) }}">{{ $post->title }}</a>
                    </div>
                    <div class="text-xs text-grey font-medium">
                        {{ $post->publish_date }}
                    </div></div>
                <div class="flex justify-between items-center">
                    <div class="text-sm my-1 px-2 border-r {{ $post->published ? 'text-green' : 'text-orange' }}">{{ $post->published ? 'Published' : 'Draft' }}</div>
                     {{--<div class="text-sm my-1 px-2">@include('back._partials.deleteButton', ['url' => action('Back\PostsController@destroy', [$post->id])])</div>--}}
                </div>
            </div>
        @endforeach
@endsection
