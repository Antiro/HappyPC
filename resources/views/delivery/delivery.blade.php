@extends('layouts.app')
@section('title', 'Happy PC | Доставка')
@section('page', 'Доставка')

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.banner')
    </header>

    <main class="container">
        <div class="section section-x service-single-v3 tc-grey bg-me show is-shadow service" style="padding-bottom: 40px">
            <div class="container">
{{--                <div class="row justify-content-center">--}}
{{--                    <div class="col-12 text-left text-md-center">--}}
{{--                        <div class="section-head section-md">--}}
{{--                            <h2>Доставка</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row gutter-vr-30px">

                    <div class="col-md-4">
                        <img src="{{asset('storage/add/scale_1200.png')}}" alt="Доставка">
                    </div>

                    <div class="col-md-8">
                        <div class="wgs wgs-service shadow" style="padding: 30px; padding-bottom: 15px">
                            @foreach($delivery as $del)
                                <div class="col-12 text-left text-md-center">
                                    <div class="section-head section-md" style="margin-bottom: 15px">
                                        <h2>{{$del->name}}</h2>
                                    </div>
                                </div>
                                <div class="col-12 text-left text-md-center" style="margin-bottom: 30px">
                                    <p>{{$del->description}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-12 text-left text-md-center" style="margin-top: 30px">
                            <h5>Если у вас возникли вопросы, то вы можете позвонить по номеру телефона</h5>
                        <h6>+7 (904) 088-88-88</h6>
{{--                        <h6>или свяжитесь с нам в соц. сетях</h6>--}}
                    </div>
                </div>
            </div>
        </div>
    </main>
    </body>

    @include('layouts.footer')
@endsection

