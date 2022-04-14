@extends('layouts.app')
@section('title', 'Happy PC | Контакты')
@section('page', 'Контакты')

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.banner')
    </header>

    <main class="container">
        <div class="section service-single-v3 tc-grey bg-me is-shadow service">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-left text-md-center">
                        <div class="section-head section-md">
                            <h2>Адрес мастерской</h2>
                            <p class="lead">Россия, Белгород, Преображенская улица, 78Б</p>
                        </div>
                    </div>
                </div>

                <div class="row gutter-vr-30px">

                    {{--Map--}}
                    <div class="col-md-8">
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?um=constructor%3A01bbe3198efd1a31aa81b80734eae1acdf291ba21b3b6a2657fe91254058bf57&amp;source=constructor"
                            width="100%" height="96%" frameborder="0">
                        </iframe>
                    </div>

                    {{--Working hours--}}
                    <div class="col-md-4 order-md-last">
                        <div class="wgs wgs-service shadow">
                            <ul class="wgs-menu text-center">
                                <li><a class="timeOpen wgs-service-first-child">Время работы</a></li>
                                <li><a class="timeOpen">Пн: 10:00 - 18:00</a></li>
                                <li><a class="timeOpen">Вт: 10:00 - 18:00</a></li>
                                <li><a class="timeOpen">Ср: 10:00 - 18:00</a></li>
                                <li><a class="timeOpen">Чт: 10:00 - 18:00</a></li>
                                <li><a class="timeOpen">Пт: 10:00 - 18:00</a></li>
                                <li><a class="timeOpen">Сб: 10:00 - 14:00</a></li>
                                <li><a class="timeOpen">Вс: Закрыто</a></li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="row justify-content-center" style="margin-top: 5%">
                    <div class="col-12 text-left text-md-center">
                        <div class="section-head section-md">
                            <h2>Социальные сети</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center gutter-vr-30px">
                    @foreach($contacts as $contact)

                        <div class="col-sm-6 col-lg-2 text-center">
                            <a href="{{$contact->link}}" target="_blank">
                                <div class="career-process bg-light shadow-alt">
                                    <div class="feature-icon">
                                        <em class="{{$contact->icon}}"></em>
                                        <br><br>
                                        <h4>{{$contact->name}}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </main>
    </body>

    @include('layouts.footer')
@endsection

