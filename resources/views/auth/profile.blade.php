@extends('layouts.app')
@section('title', "Happy PC | $user->name")
@section('page', "$user->name")

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.bannerU')
    </header>

    <div class="modal fade bd-example-modal-lg" id="imgModal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Выберите изображение из списка</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('user.update', ['user' => $user])}}">
                        @csrf
                        @method('PATCH')

                        <input name="name" value="{{$user->name}}" style="display: none">
                        <input name="surname" value="{{$user->surname}}" style="display: none">
                        <input name="phone" value="{{$user->phone}}" style="display: none">
                        <input name="email" value="{{$user->email}}" style="display: none">

                        <div class="row gutter-vr-20px">
                            @foreach($imgUsers as $img)
                                <div class="col-lg-2 col-sm-2">
                                    <input type="radio" name="img_id" id="{{$img->id}}" value="{{$img->id}}"/>
                                    <label for="{{$img->id}}">
                                        <img src="{{asset('storage/users')}}/{{$img->img}}"
                                             alt="{{$img->id}}" class="img-ch">
                                    </label>
                                </div>
                            @endforeach

                            <div class="modal-footer col-lg-12">
                                <button class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="btn">Сохранить</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="section tc-grey bg-me is-shadow profile row gutter-vr-30px" style="padding: 10px; margin-top: 2% !important;" id="career">
        @if ($message = session()->get('success'))
            <div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                <strong>{{$message}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())

            <div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        @endif


        <div class="col-md-3">
            <div class="wgs-service shadow">
                <ul class="wgs-menu">
                    <li><a href="{{route('profile')}}" class="focusProfile">Профиль</a></li>
                    <li><a href="{{route('profileApplications')}}">Заявки ({{count($applications)}})</a></li>
                    <li><a href="{{route('profileReviews')}}">Отзывы ({{count($reviews)}})</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div class="col-md-12 bg-me is-shadow collapse show order-md-last" id="career-one" data-parent="#career">
                <div class="row">

                    <div class="section-head section-md form-field col-md-12" style="margin: 15px">
                        <br>
                        <h2>Настройка профиля</h2>
                    </div>

                    <div class="form-field col-md-8 text-center">
                        <form method="post" action="{{route('user.update', ['user' => $user])}}">
                            @csrf
                            @method('PATCH')
                            <div class="row">

                                <div class="col-lg-3 col-sm-12">
                                    <input name="img_id" value="{{$user->img_id}}" style="display: none">
                                    <a class="form-control input form-info">Имя:</a>
                                </div>

                                <div class="col-lg-9 col-sm-12">
                                    <input type="text" class="form-control input bdr-b required"
                                           aria-label="Sizing example input"
                                           aria-describedby="inputGroup-sizing-default" name="name"
                                           placeholder="{{$user->name}}" value="{{$user->name}}">
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <a class="form-control input form-info">Фамилия:</a>
                                </div>

                                <div class="col-lg-9 col-sm-12">
                                    <input type="text" class="form-control input bdr-b required"
                                           aria-label="Sizing example input"
                                           aria-describedby="inputGroup-sizing-default" name="surname"
                                           placeholder="{{$user->surname}}" value="{{$user->surname}}">
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <a class="form-control input form-info">Email:</a>
                                </div>
                                <div class="col-lg-9 col-sm-12">
                                    <input type="text" class="form-control input bdr-b required"
                                           aria-label="Sizing example input"
                                           aria-describedby="inputGroup-sizing-default" name="email"
                                           placeholder="{{$user->email}}"
                                           value="{{$user->email}}">
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <a class="form-control input form-info">Телефон:</a>
                                </div>
                                <div class="col-lg-9 col-sm-12">
                                    <input type="tel" class="form-control input bdr-b required"
                                           aria-label="Sizing example input"
                                           aria-describedby="inputGroup-sizing-default" name="phone"
                                           placeholder="{{$user->phone}}"
                                           value="{{$user->phone}}">
                                </div>

                            </div>
                            <button type="submit" class="btn" style="margin-top: 2%">Сохранить</button>
                        </form>
                    </div>

                    <div class="form-field col-md-4 ">
                        <a data-toggle="modal" data-target="#imgModal">
                            <div class="project-item">
                                <div class="project-image">
                                    <img src="{{asset('storage/users/')}}/{{$user->img->img}}" alt="{{$user->name}}">
                                </div>
                                <div class="project-over">
                                    <div class="project-content">
                                        <h4>Изменить изображение</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    </div>
    <br>

@endsection
