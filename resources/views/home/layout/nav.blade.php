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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.listPost', ['truyen-dan-gian']) }}">Truyện dân gian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.listPost', ['truyen-nuoc-ngoai']) }}">Truyện nước ngoài</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.listPost', ['anh-hai-huoc']) }}">Ảnh hài hước</a>
                </li>
            </ul>
{{--            <form class="form-inline my-2 my-lg-0">--}}
{{--                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--            </form>--}}
        </div>
    </div>
</nav>
