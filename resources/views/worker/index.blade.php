@extends('layouts.app')
@section('title', 'Happy PC | Команда')
@section('page', 'Команда')

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.banner')
    </header>

    <main class="container">
        <div class="section service-single-v3 tc-grey bg-me show is-shadow service">
            <div class="section team tc-grey">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <div class="section-head section-md mtm-10">
                                <h2>Состав команды мастерской</h2>
                                <p class="lead">Наша трудолюбивая команда помогаем клиентам со сложным и не очень
                                    ремонтом.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center gutter-vr-30px">
                        @foreach($workers as $worker)
                            <div class="col-lg-4 col-sm-6">
                                <a href="{{route("team.show",$worker->id)}}">
                                    <div class="team-single text-center">

                                        <div class="team-image is-shadow">
                                            <img src="{{asset('storage')}}/{{$worker->img}}"
                                                 alt="{{$worker->name}}">
                                        </div>

                                        <div class="team-content team-content-s2">
                                            <h5 class="team-name">{{$worker->name}}</h5>
                                            <p>{{$worker->implodeClasses($worker)}} ремонт</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </main>

    </body>

    @include('layouts.footer')
@endsection
