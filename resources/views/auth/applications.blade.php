@extends('layouts.app')
@section('title', "Happy PC | Ваши заявки")
@section('page', "Ваши заявки")

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
                        <li><a href="{{route('profileApplications')}}" class="focusProfile">Заявки ({{count($applications)}})</a></li>
                        <li><a href="{{route('profileReviews')}}">Отзывы ({{count($reviews)}})</a></li>
                    </ul>
                </div>
            </div>

        <div class="col-md-9">

            <div class="col-md-12 bg-me is-shadow collapse show order-md-last" id="career-two" data-parent="#career">
                <div class="row">
                    <div class="section-head section-md form-field col-md-12" style="margin: 15px">
                        <br>
                        <h2>Ваши заявки</h2>
                        @if(count($applications) == 0)
                            <p>У вас пока нет заявок</p>
                        @endif
                        <p>Кол-во заказов: {{count($applications)}}</p>
                    </div>
{{--                    @dd(count($applications));--}}
                    @if(count($applications) != 0)
                        <div class="col-12">
                            <div class="accordion">
                                <div class="col-sm-12" style="margin: 10px 0 0 10px">
                                    <table id="table2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-center">№</th>
                                            <th scope="col" class="text-center">Сумма</th>
                                            <th scope="col" class="text-center">Кол-во услуг</th>
                                            <th scope="col" class="text-center">Статус</th>
                                            <th scope="col" class="text-center">Дата</th>
                                            <th scope="col" class="text-center">Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($applications as $application)
                                            <tr>
                                                <th scope="row" class="td-table">
                                                    <a href="{{ route('application.show', $application->id)}}">{{$application->id}}</a></th>
                                                <td class="td-table">
                                                    {{ $application->serviceApplications->pluck('service')->pluck('price')->sum() }} ₽
                                                </td>
                                                <td class="td-table">
                                                    {{ $application->serviceApplications->pluck('service')->count() }} шт.
                                                </td>
                                                <td class="td-table">
                                                    {{$application->status->name}}
                                                </td>
                                                <td class="td-table">
                                                    {{$application->date_application}}
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn" style="margin: 1%"
                                                       href="{{ route('application.show', $application->id)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
                                                    @if($application->status->name == 'В обработке')
                                                        <form
                                                            action="{{ route('application.NewDestroy', $application) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLabel">Удалить</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Вы действительно хотите удалить(отменить) заявку?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                                                            <form
                                                                                action="{{ route('application.NewDestroy', $application) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-sm btn-danger me-2 w-25">Удалить</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#staticBackdrop" style="margin: 1%">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </form>
                                                    @endif
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
