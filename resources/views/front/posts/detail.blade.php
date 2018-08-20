@extends('front.layouts.master')

@section('title', $post->formatted_title )

@section('content')

    @auth
        <div class="pb-4">
            <a class="button" target="_blank" href="{{ action('Back\PostsController@edit', $post->id) }}">Edit</a>
        </div>
    @endauth
<article itemscope itemtype="http://schema.org/Article">

    <h1 itemprop="name headline">{{ $post->formatted_title }}</h1>
    <link itemprop="image" href="specific-news-thumbnail.jpg" />
    <div class="text-grey-darker text-sm pb-6 border-b text-grey">
        Posted on <time itemprop="datePublished" datetime="{{ $post->publish_date->format(DateTime::ATOM) }}">{{ $post->publish_date }}</time> |
        <span itemprop="author" itemscope itemtype="http://schema.org/Person">
        <span class="post-author-name" itemprop="name">{{ $post->author }}</span>
        </span>
    </div>

    <div class="pt-4 post-content" itemprop="articleBody">
        {!! $post->text !!}
    </div>

    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <meta itemprop="name" content="Mawgyuncity">
            <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
            <img src="http://www.mycorp.com/logo.jpg"/>
            <meta itemprop="url" content="http://www.mycorp.com/logo.jpg">
            <meta itemprop="width" content="400">
            <meta itemprop="height" content="60">
        </div>
    </div>

</article>


@endsection

@section('seo')
    <meta property="og:title" content="{{ $post->title }} | Mawgyuncity"/>
    <meta property="og:description" content="{{ $post->excerpt }}"/>

    @foreach($post->tags as $tag)
        <meta property="article:tag" content="{{ $tag->name }}"/>
    @endforeach
    <meta property="article:published_time" content="{{ $post->publish_date->toIso8601String() }}"/>
    <meta property="og:updated_time" content="{{ $post->updated_at->toIso8601String() }}"/>

    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:description" content="{{ $post->excerpt }}"/>
    <meta name="twitter:title" content="{{ $post->title }} | Mawgyuncity"/>
    <meta name="twitter:site" content="@mawgyuncity"/>
    <meta name="twitter:image" content="https://mawgyuncity.com/uploads/logo.jpg"/>
    <meta name="twitter:creator" content="@mawgyuncity"/>
@endsection
