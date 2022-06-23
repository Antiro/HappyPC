@extends('layouts.admin')
@section('title', 'Отзывы')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Отзывы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Отзывы</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12" style="margin-top: 2%">
                <form action="{{ route('admin.ReviewsAdminView') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6"><h3 style="margin-bottom: 20px">Фильтрация по статусу
                                        заявки</h3></div>
                                <div class="col-lg-6 col-sm-6 text-right">
                                    <a class="btn btn-danger" style="color:white !important;"
                                       href="{{ route('admin.ReviewsAdminView') }}">Сбросить фильтр</a>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($statuses as $st)

                                    <div class="form_radio_btn col-lg-4">
                                        <input type="radio" name="status" value="{{ $st->id }}"
                                               id="{{ $st->id }}"
                                               onchange="this.form.submit()" {{ $status == $st->id ? 'checked': ''}}>
                                        <label class="w-100 form-check-label btn btn-primary text-center"
                                               for="{{ $st->id }}">{{ $st->name }}</label>
                                    </div>

                                @endforeach
                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="table1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Заявка</th>
                                        <th>Услуга</th>
                                        <th>Пользователь</th>
                                        <th>Оценка</th>
                                        <th>Статус</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($reviews as $review)
                                        <tr>
                                            <td>{{$review->id}}</td>
                                            <td>{{$review->application_id}}</td>
                                            <td>{{$review->service->name}}</td>
                                            <td>{{$review->user->name}}</td>
                                            <td>{{ $review->evaluation == null ? 'Нет оценки' : $review->evaluation->name  }}</td>
                                            <td>{{$review->status->name}}</td>
                                            <td class="text-center">

                                                <a class="btn bg-primary" href="{{ route('review.edit', $review) }}">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
