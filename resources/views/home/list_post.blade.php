@extends('home.layout.layout')

@section('title')
    <title>{{ $category->name }}</title>
@endsection

@section('content')
    @foreach($posts as $post)
        <div class="row p-2">
            <div class="col-4">
                <img src="{{ asset($post->picture) }}" class="img-fluid">
            </div>
            <div class="col-8">
                <h4>{{ $post->name }}</h4>
                <div style="line-height: 1.5em; height: 3em; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; width: 100%;">
                    {!! $post->content !!}
                </div>
                <p>...</p>
                <a class="btn btn-sm btn-success" href="{{ route('home.detailPost', [$category->short_tag, $post->short_tag]) }}">Xem thêm</a>
            </div>
        </div>
    @endforeach
@endsection
