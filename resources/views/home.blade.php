@extends('layouts.app')
@section('title', 'Happy PC')

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.slider')
    </header>

    <main class="container">

        <!--sections -->
        @include('inc.sections.worker')
    </main>
    @include('inc.sections.statistic')
    <main class="container">

{{--        @include('inc.sections.feature')--}}

        @include('inc.sections.services')

        @include('inc.sections.review')

        @include('inc.sections.partner')

    </main>
    </body>

    @include('layouts.footer')
@endsection
