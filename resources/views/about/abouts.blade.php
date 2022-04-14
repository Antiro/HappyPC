@extends('layouts.app')
@section('title', 'Happy PC | О нас')
@section('page', 'О нас')

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.banner')
    </header>

    <main class="container">
        <div class="section section-x tc-grey-alt bg-me is-shadow">
            <div class="container">

                @foreach($abouts as $about)
                    @if ($about->id % 2 == 1)
                        <div class="row gutter-vr-30px">
                            <div class="col-md-6 order-md-last">
                                <div class="bg-img">
                                    <div class="bg-image">
                                        <img src="{{asset('storage')}}/{{$about->img}}" alt="image about">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-block fw-3 tc-light bg-primary block-pad-xl">
                                    <h2>{{$about->title}}</h2>
                                    <br>
                                    <p>{{$about->description}}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row gutter-vr-30px">
                            <div class="col-md-6">
                                <div class="bg-img">
                                    <div class="bg-image">
                                        <img src="{{asset('storage')}}/{{$about->img}}" alt="image about">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="text-block fw-3 bg-secondary block-pad-xl bg-light">
                                    <h2>{{$about->title}}</h2>
                                    <br>
                                    <p>{{$about->description}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </main>

{{--    @include('inc.sections.statistic')--}}

    </body>

    @include('layouts.footer')
@endsection
