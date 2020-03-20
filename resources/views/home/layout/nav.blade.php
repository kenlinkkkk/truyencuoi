<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <img src="{{ asset('assets/main/images/logo4-dark.png') }}" alt="logo" class="navbar-brand" style="width: 70px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home.index') }}">Trang chủ</a>
                </li>
                @php($categories = \App\Models\Category::where('status', '=', 1)->get())
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.listPost', [$category->short_tag]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
            </ul>
{{--            <form class="form-inline my-2 my-lg-0">--}}
{{--                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--            </form>--}}
        </div>
    </div>
</nav>
