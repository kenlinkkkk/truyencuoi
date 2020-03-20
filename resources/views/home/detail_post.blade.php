@extends('home.layout.layout')

@section('title')
    <title>{{ $post->name }}</title>
@endsection

@section('content')
        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                <img src="{{ asset($post->picture) }}" class="img-fluid">
            </div>
            <div class="col-sm-5"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>{{ $post->name }}</h4>
                {!! $post->content !!}
            </div>
        </div>
@endsection
