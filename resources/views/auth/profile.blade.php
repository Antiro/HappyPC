@extends('layouts.app')
@section('title', "$user->name")
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

    <div class="section tc-grey bg-me is-shadow profile row gutter-vr-30px" style="padding: 20px" id="career">


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
                    <li><a data-toggle="collapse" data-target="#career-one">Профиль</a></li>
                    <li><a data-toggle="collapse" data-target="#career-two">Заявки</a></li>
                    <li><a data-toggle="collapse" data-target="#career-three">Отзывы</a></li>
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
                            <input name="img_id" value="{{$user->img_id}}" style="display: none">

                            Email <input type="text" name="email" placeholder="{{$user->email}}"
                                         value="{{$user->email}}"
                                         class="input bdr-b required">
                            Имя <input type="text" name="name" placeholder="{{$user->name}}" value="{{$user->name}}"
                                       class="input bdr-b required">
                            Телефон <input type="tel" name="phone" placeholder="{{$user->phone}}"
                                           value="{{$user->phone}}"
                                           class="input bdr-b required">

                            <button type="submit" class="btn">Сохранить</button>
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

            <div class="col-md-12 bg-me is-shadow collapse order-md-last" id="career-two" data-parent="#career">
                <div class="row">
                    <div class="section-head section-md form-field col-md-12" style="margin: 15px">
                        <br>
                        <h2>Ваши заявки</h2>
                    </div>
                    <div class="col-12">
                        <div class="accordion">
                            @if($applications == [])
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <div
                                            class="d-flex justify-content-between align-items-center collapsed"
                                            data-toggle="collapse">
                                            <p>
                                                <a><strong>У вас пока нет заявок</strong></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @foreach($applications as $app)
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <div
                                            class="d-flex justify-content-between align-items-center collapsed"
                                            data-toggle="collapse">
                                            <p><a href="{{route("services.show",$app->service->id)}}">
                                                    <strong>{{$app->service->name}}</strong>
                                                </a></p>
                                            <p>{{$app->status->name}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-md-12 bg-me is-shadow collapse order-md-last" id="career-three" data-parent="#career">
                <div class="row">
                    <div class="section-head section-md form-field col-md-12" style="margin: 15px">
                        <br>
                        <h2>Ваши отзывы</h2>
                    </div>
                    <div class="col-12">
                        <div class="accordion">
                            @if($reviews == [])
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <div
                                            class="d-flex justify-content-between align-items-center collapsed"
                                            data-toggle="collapse">
                                            <p>
                                                <a><strong>У вас пока нет отзывов</strong></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @foreach($reviews as $rev)
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <div
                                            class="d-flex justify-content-between align-items-center collapsed "
                                            data-toggle="collapse">
                                            <p>
                                                <a href="{{route("services.show",$rev->service->id)}}"><strong>{{$rev->service->name}}</strong></a>
                                            </p>
                                            <p>{{$rev->getShortTextAttribute()}}</p>
                                            <p>{{$rev->evaluation->name}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <br>
            </div>
        </div>
    </div>
    </div>
    <br>

@endsection
