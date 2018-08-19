@extends('front.layouts.master')

@section('title', 'Home')

@section('content')

    @include('front.posts._partials.head')

    @include('front.posts._partials.well')

    @include('front.posts._partials.list')

@endsection
