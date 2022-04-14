@extends('layouts.admin')
@section('title', 'Админ панель')

@section('content')
    <div class="content-wrapper">
        <!-- Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Главная</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <h5 class="mt-4 mb-2">Статистика</h5>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-gradient-success">
                        <span class="info-box-icon"><i class="fa-solid fa-clipboard-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Выполненых заявок</span>
                            <span class="info-box-number">{{$applicationsDone}} из {{$applications}}</span>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-gradient-success">
                        <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Лайков</span>
                            <span class="info-box-number">{{$evaluationsLikes}}</span>
                        </div>
                    </div>
                </div>

{{--                <div class="col-md-3 col-sm-6 col-12">--}}
{{--                    <div class="info-box bg-gradient-warning">--}}
{{--                        <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>--}}

{{--                        <div class="info-box-content">--}}
{{--                            <span class="info-box-text">Events</span>--}}
{{--                            <span class="info-box-number">41,410</span>--}}

{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar" style="width: 70%"></div>--}}
{{--                            </div>--}}
{{--                            <span class="progress-description">--}}
{{--                  70% Increase in 30 Days--}}
{{--                </span>--}}
{{--                        </div>--}}
{{--                        <!-- /.info-box-content -->--}}
{{--                    </div>--}}
{{--                    <!-- /.info-box -->--}}
{{--                </div>--}}

            </div>

            <div class="container-fluid">
                <h5 class="mt-4 mb-2"></h5>
                <div class="row">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                <h3>{{$services}}</h3>
                                <p>Услуги</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('admin.servicesAdminView')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                <h3>{{$applicationsNew}}</h3>
                                <p>Новых заявок</p>
                            </div>
                            <div class="icon">
                                <i class="ion fa-solid fa-file-circle-plus"></i>
                            </div>
                            <a href="{{route('admin.ApplicationsAdminView')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                <h3>{{$reviews}}</h3>
                                <p>Новых отзывов</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-happy"></i>
                            </div>
                            <a href="{{route('admin.ReviewsAdminView')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                <h3>{{$users}}</h3>
                                <p>Пользователей</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{route('admin.UsersAdminView')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                <h3>{{$workers}}</h3>
                                <p>Работников</p>
                            </div>
                            <div class="icon">
                                <i class="ion fa-solid fa-people-group"></i>
                            </div>
                            <a href="{{route('admin.WorkersAdminView')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                <h3>{{$sponsors}}</h3>
                                <p>Спонсоров</p>
                            </div>
                            <div class="icon">
                                <i class="ion fa-solid fa-handshake"></i>
                            </div>
                            <a href="{{route('admin.SponsorsAdminView')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                <h3>{{$contactsCount}}</h3>
                                <p>Контактов</p>
                            </div>
                            <div class="icon">
                                <i class="ion fa-solid fa-address-book"></i>
                            </div>
                            <a href="{{route('admin.SponsorsAdminView')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>


                <div class="row"></div>

            </div>
        </section>
    </div>
@endsection
