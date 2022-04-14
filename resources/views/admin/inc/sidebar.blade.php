<aside class="main-sidebar sidebar-dark-primary elevation-1">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('storage/logo/logo4.png')}}" alt="LOGO" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">HAPPY PC</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
                <img src="{{asset('storage/users')}}/{{$admin->img->img}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>

            <div class="info">
                <a href="{{route('profile')}}" class="d-block">{{$admin->name}}</a>
            </div>

        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="fa-solid fa-house"></i>
                        <p>
                            Главная
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.servicesAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-people-arrows-left-right"></i>
                        <p>
                            Услуги
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.ApplicationsAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-bell-concierge"></i>
                        <p>
                            Заявки
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.AboutUsAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-people-robbery"></i>
                        <p>
                            О нас
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.ContactsAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-address-book"></i>
                        <p>
                            Контакты
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.ReviewsAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-message"></i>
                        <p>
                            Отзывы
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.SponsorsAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-handshake-angle"></i>
                        <p>
                            Спонсоры
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.UsersAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.WorkersAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-people-group"></i>
                        <p>
                            Работники
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.DeliveryAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-truck"></i>
                        <p>
                            Доставка
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
