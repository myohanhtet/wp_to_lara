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
        Posted on <time datetime="{{ $post->publish_date->format(DateTime::ATOM) }}">{{ $post->publish_date }}</time> |
        <span class="post-author-name">{{ $post->author }}</span>
    </div>

    <div class="pt-4 post-content">
        {!! $post->text !!}

    </div>

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
    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "name": "{{ $post->title }}",
        "url": "{{ $post->url }}",
        "description": "{{ $post->excerpt }}",
        "breadcrumb":{
        "@type":"BreadcrumbList",
        "itemListElement":[
         {
            "@type":"ListItem",
            "position":"1",
            "item":{
                "@type":"WebSite",
                "@id":"http://mawgyuncity.com",
                "name":"Home"
            }
        },
        {
            "@type":"ListItem",
            "position":"2",
            "item":{
                "@type":"WebPage",
                "@id":"{{ $post->url }}",
                "name":"{{ $post->title }}"
            }
        }
    ]},
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "NewsArticle",

        "mainEntityOfPage": "https://www.aljazeera.com/news/2018/08/myanmar-aung-san-suu-kyi-defends-policies-rohingya-180822060114385.html",
        "headline": "Myanmar: Aung San Suu Kyi defends policies towards Rohingya",
        "datePublished": "22 Aug 2018 07:48 GMT",
        "dateModified": "22 Aug 2018 07:48 GMT",
        "description": "Suu Kyi refuses to give a timeline on the repatriation of 700,000 Rohingya, saying it depends on Bangladesh.",
        "author": {
        "@type": "Organization",
        "name": "Al Jazeera"
        },
        "publisher": {
          "@type": "Organization",
          "name": "Al Jazeera",
          "logo": {
            "@type": "ImageObject",
            "url": "https://www.aljazeera.com/mritems/assets/images/AJLOGOGOOGLE.png",
            "width": 250,
            "height": 40
          }
        },
        "image": {
            "@type": "ImageObject",
            "url": "https://www.aljazeera.com/mritems/imagecache/mbdxxlarge/mritems/Images/2018/8/22/84c4f18922ce49cc8e355e71935896f2_18.jpg",
                "height": 450,
                "width": 800
        }
    }
    </script>


@endsection
