<div class="section section-banner">

    <div class="bg-image bg-fixed banner-t">
        <img src="{{asset('storage/add/shape-net-orage.png')}}" alt="bg">
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 col-sm-9">
                <div class="banner-content">
                    <br>
                    <h1 class="banner-heading">@yield('page')</h1>
                    <ul class="banner-menu">
                        <li><a href="{{route('home')}}">Главная</a></li>
                        <li><a href="{{route('team.index')}}">Команда</a></li>
                        <li><a>@yield('page')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
