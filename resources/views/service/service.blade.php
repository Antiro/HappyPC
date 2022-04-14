@extends('layouts.app')
@section('title', "Happy PC | {$service->name}")
@section('page', "{$service->name}")

@section('content')

    @auth
        <div class="modal fade" id="revModal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true" style="overflow: no-display">
            <div class="modal-dialog" role="document">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Забронировать услугу?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{ route('application.store')}}">
                            @csrf
                            <div class="modal-body">
                                <p>Услуга: {{$service->name}}</p>
                                <p>Вид ремонта: {{$service->ServiceClass->name}}</p>
                                <p>Цена: {{$service->price}} ₽</p>
                                <p>Оставить коментарий</p>
                                <input type="text" name="user" id="user" value="{{Auth::user()->id}}"
                                       style="display: none">
                                <input type="text" name="service" id="service" value="{{$service->id}}"
                                       style="display: none">
                                <textarea name="comment" cols="40" rows="3" id="comment"
                                          maxlength="40">Комментарий</textarea>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="btn">Забронировать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.bannerS')

    </header>

    <main class="container">
        <div class="section section-x service-single-v3 tc-grey bg-me show-bl is-shadow">
            <div class="row gutter-vr-30px">

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

                <div class="col-md-6">
                    @if ($service->imagesOfServices->count() != 1)
                    <div class="has-slider">
                        <div class="has-carousel " data-effect="true" data-items="1" data-loop="true" data-dots="false"
                             data-auto="true"
                             data-navs="true">

                            @foreach($service->imagesOfServices as $img)
                                <div class="card-img slide-serv">

                                    <div class="bg-image change-bg">
                                        <img src="{{asset('storage')}}/{{$img['img']}}"
                                             alt="{{$service->name}}">
                                    </div>

                                </div>
                            @endforeach

                        </div>
                        <div class="tes-arrow">
                            <a class="slick-prev slick-arrow"><i class="icon ti ti-angle-left"></i></a>
                            <a class="slick-next slick-arrow"><i class="icon ti ti-angle-right"></i></a>
                        </div>
                    </div>
                    @else
                        <div class="has-slider">
                            <div class="has-carousel " data-effect="true" data-items="1" data-loop="true" data-dots="false"
                                 data-auto="true"
                                 data-navs="true">

                                @foreach($service->imagesOfServices as $img)
                                    <div class="card-img slide-serv">

                                        <div class="bg-image change-bg">
                                            <img src="{{asset('storage')}}/{{$img['img']}}"
                                                 alt="{{$service->name}}">
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-md-6 order-md-last">
                    <div>
                        <div class="text-center">
                            <div class="section-head section-md">
                                <h4>{{$service->name}}</h4>
                                <h5 class="heading-xs">{{$service->ServiceClass->name}} ремонт</h5>
                            </div>
                        </div>
                        <div class="text-center row">

                            <div class="col-12" style="margin-bottom: 10%">
                                <p>{{$service->description}}</p>
                            </div>

                            <div class="col-6" style="vertical-align: middle;">
                                <h4 style="margin-top: 3%">Цена: {{$service->price}} ₽</h4>
                            </div>
                            @auth
                                <div class="col-6">
                                    <button type="submit" class="btn" data-toggle="modal" data-target="#revModal"
                                            style="padding: 5%">
                                        Забронировать
                                    </button>
                                </div>
                            @endauth
                            @guest
                                <div class="col-6">
                                    <p class="text-danger" style="font-weight: bold">Для того чтобы забронировать
                                        услугу, необходимо
                                        зарегистрироваться</p>
                                </div>
                            @endguest

                            <div class="col-12" style="margin-top: 15%">
                                <p style="margin-bottom: 0px">Мы принимаем заявки из других городов</p>
                                <a href="{{route('delivery')}}">информация о доставке</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @auth
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="ath-body bg-light is-shadow" style="padding: 20px">
                        <h5 class="ath-heading title">Оставить отзыв</h5>
                        <form method="post" action="{{ route('review.store')}}">
                            @csrf
                            <div class="row">
                                <input type="text" name="user" id="user" value="{{Auth::user()->id}}"
                                       style="display: none">
                                <input type="text" name="service" id="service" value="{{$service->id}}"
                                       style="display: none">

                                <div class="form-field col-md-9">
                                    <textarea name="comment" cols="40" rows="3" maxlength="40"></textarea>
                                </div>

                                <div class="form-field col-md-2 text-center" style="margin-right: 1px;margin-left: 2%">

                                    <div class="like form_radio_btn">
                                        <input id="radio-1" type="radio" name="evaluation" value="1" checked>
                                        <label for="radio-1" class="btn">Like</label>
                                    </div>

                                    <div class="dislike form_radio_btn">
                                        <input id="radio-2" type="radio" name="evaluation" value="2">
                                        <label for="radio-2" class="btn ">Dislike</label>
                                    </div>

                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="form-field col-md-12 text-center">
                                    <button type="submit" class="btn">Отправить отзыв</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth

        @guest
            <div>
                <div class="comments-list bg-light text-center reg-rev is-shadow">
                    <p class="text-danger" style="font-weight: bold">Для того чтобы оставить отзыв, необходимо
                        зарегистрироваться</p>
                </div>
            </div>
        @endguest


        <div class="comments-list bg-me is-shadow">
            <div class="section-head row" style="padding:3%">
                <h2 class="col-12">Отзывы</h2>
                 @if ($reviewsCl== 0)
                    <div class="lead col-12">Пока на эту услугу нет ни одного отзыва, напишите его первым !</div>
                @else
                    <div class="lead col-8">Кол-во отзывов: {{$reviewsCl}}</div><div class="lead col-4 text-right">Like:{{$likes}} Dislike:{{$dislike}}</div>
                @endif

            </div>
            @foreach($reviews as $review)
                <div class="media row gutter-vr-30px comments-row">
                    <div class="col-md-2 px-5">
                        <img src="{{asset('storage/users')}}/{{$review->user->img->img}}"
                             alt="{{$review->user->name}}" draggable="false">
                    </div>
                    <div class="col-md-10">
                        <div class="comment-content">
                            <p class="media-name"><strong>{{$review->user->name}}</strong></p>
                            <p>{{$review->text}}</p>
                            <p class="{{$review->evaluation->name}} text-right"><em
                                    class="{{$review->evaluation->icon}}"></em> {{$review->evaluation->name}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    </body>

    @include('layouts.footer')

@endsection
