@extends('home.layout.layout')

@section('title')
    <title>{{ $post->name }}</title>
@endsection

@section('content')
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <img src="{{ asset($post->picture) }}" class="img-fluid">
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>{{ $post->name }}</h4>
                <p>{{ $post->content }}</p>
            </div>
        </div>
@endsection
