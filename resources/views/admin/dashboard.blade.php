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

        <section class="content" style="margin-left: 1%">
            <h5 class="mt-4 mb-2">Статистика</h5>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box box-happy">
                        <span class="info-box-icon"><i class="fa-solid fa-clipboard-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Выполненых заявок</span>
                            <span class="info-box-number">{{$readyApplications}}</span>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box box-happy">
                        <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Лайков</span>
                            <span class="info-box-number">{{$evaluationsLikes}}</span>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box box-happy">
                        <span class="info-box-icon"><i class="ion ion-person"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Пользователей</span>
                            <span class="info-box-number">{{$users}}</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container-fluid">
                <h5 class="mt-4 mb-2">Новое</h5>
                <div class="row">

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                <h3>{{$workApplications}}</h3>
                                <p>Новых заявок</p>
                            </div>
                            <div class="icon">
                                <i class="ion fa-solid fa-file-circle-plus"></i>
                            </div>
                            <a href="{{route('admin.ApplicationsAdminView')}}?status=1" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
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
                            <a href="{{route('admin.ReviewsAdminView')}}?status=1" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
@endsection
