@extends('home.layout.layout')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    @foreach($posts as $post)
        <div class="row p-2">
            <div class="col-5">
                <img src="{{ asset($post->picture) }}" class="img-fluid" style="max-width: 90px">
            </div>
            <div class="col-7">
                <h4>{{ $post->name }}</h4>
                <div style="line-height: 1.6em; height: 3em; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; width: 100%;">
                    {!! $post->content !!}
                </div>
                <p>...</p>
                <a class="btn btn-sm btn-success" href="{{ route('home.detailPost', [$post->category->short_tag, $post->short_tag]) }}">Xem thêm</a>
            </div>
        </div>
    @endforeach
@endsection
