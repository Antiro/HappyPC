@extends('layouts.app')
@section('title', "Happy PC | Ваши отзывы")
@section('page', "Ваши отзывы")

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.bannerU')
    </header>

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
                        <li><a href="{{route('profile')}}">Профиль</a></li>
                        <li><a href="{{route('profileApplications')}}">Заявки ({{count($applications)}})</a></li>
                        <li><a href="{{route('profileReviews')}}" class="focusProfile">Отзывы ({{count($reviews)}})</a></li>
                    </ul>
                </div>
            </div>

        <div class="col-md-9">
            <div class="col-md-12 bg-me is-shadow collapse show order-md-last" id="career-three" data-parent="#career">
                <div class="row">
                    <div class="section-head section-md form-field col-md-12" style="margin: 15px">
                        <br>
                        <h2>Ваши отзывы</h2>
                        @if(count($reviews) == 0)
                            <p>У вас пока нет отзывов</p>
                        @endif
                        <p>Кол-во отзывов: {{count($reviews)}}</p>
                    </div>
                    @if(count($reviews) != 0)
                        <div class="col-12">
                            <div class="accordion">
                                <div class="col-sm-12" style="margin: 10px 0 0 10px">
                                    <table id="table2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-center">№</th>
                                            <th scope="col" class="text-center">№ Заявки</th>
                                            <th scope="col" class="text-center">Услуга</th>
                                            <th scope="col" class="text-center">Оценка</th>
                                            <th scope="col" class="text-center">Статус</th>
                                            <th scope="col" class="text-center">Дата</th>
                                            <th scope="col" class="text-center">Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($reviews as $review)
                                            <tr class="td-table">
                                                <th scope="row"><a href="{{ route('review.show', $review->id)}}">{{$review->id}}</a></th>
                                                <td  class="td-table">
                                                    {{ $review->application_id }}
                                                </td>
                                                <td  class="td-table">
                                                    {{ $review->service->name }}
                                                </td>
                                                <td class="td-table {{ $review->evaluation == null ? 'Нет оценки' : $review->evaluation->name  }}">
                                                    <em class="{{ $review->evaluation == null ? 'Нет оценки' : $review->evaluation->icon}}"></em> {{ $review->evaluation == null ? 'Нет оценки' : $review->evaluation->name  }}
                                                </td>
                                                <td class="td-table">
                                                    <span >{{ $review->status->name }}</span>
                                                </td>
                                                <td class="td-table">
                                                    {{$review->date_review}}
                                                </td>
                                                <td class="td-table">
                                                    <a class="btn" style="margin: 1%"
                                                                           href="{{ route('review.show', $review->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
@include('inc.table')
@endsection
