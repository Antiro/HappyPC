@extends('layouts.app')
@section('title', "Happy PC | {$worker->name}")
@section('page', "{$worker->name}")

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.bannerW')
    </header>

    <main class="container">
        <div class="section section-x service-single-v3 tc-grey bg-me show is-shadow">
            <div class="container">
                <div class="row gutter-vr-30px">

                    <div class="col-md-4">
                        <img src="{{asset('storage')}}/{{$worker->img}}" alt="{{$worker->name}}">
                    </div>

                    <div class="col-md-8 order-md-last justify-content-center">
                        <div class="text-center">
                            <div class="section-head section-md mtm-10">
                                <h2>{{$worker->name}}</h2>
                                <h4 class="lead">{{$worker->implodeClasses($worker)}} ремонтом</h4>
                                <p class="lead">{{$worker->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </main>
    </body>

    @include('layouts.footer')
@endsection
