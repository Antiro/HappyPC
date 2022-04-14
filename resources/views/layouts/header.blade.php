<div class="header-main">
    <div class="header-container container">
        <div class="header-wrap">
            <!-- Logo  -->
            <div class="header-logo logo">
                <a href="{{route('home')}}" class="logo-link">
                    <img class="logo logo-dark" src="{{asset('storage/logo/logo3MM.png')}}"
                         srcset="{{asset('storage/logo/logo3.png')}} 2x" alt="logo">
                    <img class="logo logo-light" src="{{asset('storage/logo/logo3MM.png')}}"
                         srcset="{{asset('storage/logo/logo3.png')}} 2x" alt="logo">
                </a>
            </div>

            <!-- Menu Toogle -->
            <div class="header-nav-toggle">
                <a href="#" class="navbar-toggle" data-menu-toggle="header-menu">
                    <div class="toggle-line">
                        <span></span>
                    </div>
                </a>
            </div>

            <!-- Menu -->
            <div class="header-navbar">
                <nav class="header-menu" id="header-menu">
                    <ul class="menu">
                        <li class="menu-item"><a class="menu-link nav-link" href="{{route('about')}}">О нас</a></li>
                        <li class="menu-item"><a class="menu-link nav-link"
                                                 href="{{route('services.index')}}">Услуги</a></li>
                        <li class="menu-item"><a class="menu-link nav-link" href="{{route('team.index')}}">Команда</a>
                        </li>
                        <li class="menu-item"><a class="menu-link nav-link" href="{{route('contacts')}}">Контакты</a>
                        </li>
                        <li class="menu-item"><a class="menu-link nav-link" href="{{route('delivery')}}">Доставка</a>
                        </li>
                    </ul>
                    <ul class="menu-btns">
                        @guest()
                            <li><a href="{{route('login')}}" class="btn btn-sm">Войти&nbsp;&nbsp; <em
                                        class="ti-user"></em></a></li>
                        @endguest
                        @auth
                            <li class="text-center align-self-center">
                                <a href="{{route('profile')}}" class="btn btn-sm">{{Auth::user()->name}}&nbsp;&nbsp;<em
                                        class="ti-user"></em></a>
                                &nbsp;
                                <a class="btn btn-sm" href="{{route('logout')}}">
                                    Выйти&nbsp;&nbsp;<em class="fa-solid fa-arrow-right-from-bracket"></em>
                                </a>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
