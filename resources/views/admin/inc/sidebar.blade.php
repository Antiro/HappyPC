<aside class="main-sidebar sidebar-dark-primary elevation-1 " style="background: rgb(73,78,82) ">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('storage/logo/logo4.png')}}" alt="LOGO" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">HAPPY PC</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2" >
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('admin.ApplicationsAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-bell-concierge"></i>
                        <p>
                            Заявки
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
                    <a href="{{route('admin.servicesAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-people-arrows-left-right"></i>
                        <p>
                            Услуги
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.workersAdminView')}}" class="nav-link">
                        <i class="fa-solid fa-people-group"></i>
                        <p>
                            Сотрудники
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Справочники
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('admin.UsersAdminView')}}" class="nav-link">
                                <i class="fa-solid fa-users"></i>
                                <p>
                                    Пользователи
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
                            <a href="{{route('admin.DeliveryAdminView')}}" class="nav-link">
                                <i class="fa-solid fa-truck"></i>
                                <p>
                                    Доставка
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

                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
