@extends('home.layout.layout')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    @foreach($posts as $post)
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <img src="{{ asset($post->picture) }}" class="img-fluid">
            </div>
            <div class="col-sm-6 col-md-8">
                <h4>{{ $post->name }}</h4>
                <p>{{ substr($post->content, 0, 100) }} ...</p>
                <a class="btn btn-sm btn-success" href="{{ route('home.detailPost', [$post->category->short_tag, $post->short_tag]) }}">Xem thêm</a>
            </div>
        </div>
    @endforeach
@endsection
