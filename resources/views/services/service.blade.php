@extends('layouts.app')
@section('title', "Happy PC | {$service->name}")
@section('page', "{$service->name}")

@section('content')

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
                            <div class="has-carousel " data-effect="true" data-items="1" data-loop="true"
                                 data-dots="false"
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
                            <div class="has-carousel " data-effect="true" data-items="1" data-loop="true"
                                 data-dots="false"
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
                                <h3>{{$service->name}}</h3>
                                <h5 class="heading-xs">{{$service->ServiceClass->name}} ремонт</h5>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12" style="margin-bottom: 10%">
                                <p>{{$service->description}}</p>
                            </div>

                            <div class="col-6" style="vertical-align: middle;">
                                <h4 style="margin-top: 3%">Цена: {{$service->price}} ₽</h4>
                            </div>
                            @auth
                                <div class="col-6">
                                    <a href="#" class="btn w-100 btn-add-product" id="{{ $service->id }}">Добавить
                                        в <i class="fa-solid fa-basket-shopping"></i></a>
                                </div>
                            @endauth
                            @guest
                                <div class="col-6">
                                    <p class="text-danger" style="font-weight: bold">Для того чтобы забронировать
                                        услугу, необходимо
                                        зарегистрироваться</p>
                                </div>
                            @endguest

                            <div class="col-12 text-center" style="margin-top: 15%">
                                <p style="margin-bottom: 0px">Мы принимаем заявки из других городов</p>
                                <a href="{{route('delivery')}}">информация о доставке</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="comments-list bg-me is-shadow">
            <div class="section-head row" style="padding:3%">
                <h2 class="col-12">Отзывы</h2>
                @if ($reviewsCl== 0)
                    <div class="lead col-12">Пока на эту услугу нет ни одного отзыва, напишите его первым !</div>
                @else
                    <div class="lead col-8">Кол-во отзывов: {{$reviewsCl}}</div>
                    <div class="lead col-4 text-right">Like:{{$likes}} Dislike:{{$dislike}}</div>
                @endif

            </div>
            @foreach($reviews as $review)
                <div class="media row gutter-vr-30px comments-row">
                    <div class="col-md-3 col-sm-12 text-center">
                        <img src="{{asset('storage/users')}}/{{$review->user->img->img}}" alt="{{$review->user->name}}"
                             draggable="false" style="padding: 4%" class="slideImg">
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div>
                            <h4 class="media-name"><strong>{{ $review->user->surname == null ? '' : $review->user->surname  }} {{$review->user->name}}</strong></h4>
                            <p><strong>{{$review->text}}</strong></p>
                            <p>
                                <small>Дата публикации: {{$review->date_review}}</small>
                                <span class="{{$review->evaluation->name}}" style="margin-left: 3%">
                                <em class="{{$review->evaluation->icon}}"></em> {{$review->evaluation->name}}
                            </span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    </body>

    @include('layouts.footer')

@endsection
@push('script')

    <script>
        async function postDataJS(route, data, _token) {
            let response = await fetch(route,
                {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8',
                    },
                    body: JSON.stringify({data, _token})
                });
            return await response.json();
        }

        document.querySelectorAll('.btn-add-product').forEach(item => {
            item.addEventListener('click', async (e) => {
                e.preventDefault()
                await postDataJS('{{ route('basket.plus') }}', e.target.id, '{{ csrf_token() }}');
            })
        })
    </script>

@endpush
