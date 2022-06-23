@extends('layouts.admin')
@section('title', 'Заявки')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Заявки</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Заявки</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12" style="margin-top: 2%">
                <form action="{{ route('admin.ApplicationsAdminView') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6"><h3 style="margin-bottom: 20px">Фильтрация по статусу заявки</h3></div>
                                <div class="col-lg-6 col-sm-6 text-right">
                                    <a class="btn btn-danger" style="color:white !important;"
                                       href="{{ route('admin.ApplicationsAdminView') }}">Сбросить фильтр</a>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($statuses as $st)

                                    <div class="form_radio_btn col-lg-3">
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
{{--                                        <th>id</th>--}}
                                        <th class="sorting sorting_desc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="id: активировать для сортировки столбцов по возрастанию" aria-sort="descending">id</th>

                                        {{--                                        <th>Заявка</th>--}}
                                        <th>Заказчик</th>
                                        <th>Кол-во услуг</th>
                                        <th>Стоимость</th>
                                        <th>Дата</th>
                                        <th>Статус</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($applications as $application)
                                        <tr>
                                            <td>{{$application->id}}</td>
{{--                                            <td>{{$application->id}}</td>--}}
                                            <td>{{$application->user->name}}</td>
                                            <td>{{$application->serviceApplications->pluck('service')->count() }} шт.
                                            </td>
                                            <td>{{$application->serviceApplications->pluck('service')->pluck('price')->sum() }}
                                                ₽
                                            </td>
                                            <td>{{$application->date_application}}</td>
                                            <td>{{$application->status->name}}</td>
                                            <td class="text-center">

                                                <a class="btn bg-primary"
                                                   href="{{ route('applications.edit', $application) }}"><i class="fa-solid fa-magnifying-glass"></i></a>

                                                <button class="btn bg-danger" type="button" data-toggle="modal"
                                                        data-target="#Modal{{$application->id}}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <div class="modal fade" id="Modal{{$application->id}}" tabindex="-1"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Уточните
                                                                    ответ</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Вы действительно хотите удалить запись?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary"
                                                                        data-dismiss="modal">Отмена
                                                                </button>
                                                                <form
                                                                    action="{{route('applications.destroy', $application)}}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                    <button class="btn btn-danger">Удалить</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

