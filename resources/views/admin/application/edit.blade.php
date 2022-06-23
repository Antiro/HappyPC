@extends('layouts.admin')
@section('title', "Заявка №$application->id")

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактирование заявки №{{$application->id}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.ApplicationsAdminView')}}">Заявки</a>
                            </li>
                            <li class="breadcrumb-item active">Заявка №{{$application->id}}</li>
                        </ol>
                    </div>
                </div>
            </div>

            @if ($message = session()->get('success'))
                <div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($message = session()->get('errors'))
                <div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card-body">
                        <div id="accordion">
                            <div class="card card-success">
                                <div class="row g-0">
                                    <div class="col-md-12 d-flex flex-column justify-content-between">
                                        <form
                                            action="{{ route('applications.update', ['application' => $application]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row g-0">
                                                <div class="col-md-6 d-flex flex-column justify-content-between">
                                                    <div class="card-body">

                                                        <div class="mb-3">
                                                            <label for="user" class="form-label">Заказчик</label>
                                                            <input type="text" class="form-control"
                                                                   name="user" placeholder="Ошибка"
                                                                   value="{{$application->user->name}}" disabled>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="user" class="form-label">Сумма заявки</label>
                                                            <input type="text" class="form-control"
                                                                   name="user" placeholder="Ошибка"
                                                                   value="{{$application->serviceApplications->pluck('service')->pluck('price')->sum() }} ₽"
                                                                   disabled>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="user" class="form-label">Кол-во услуг</label>
                                                            <input type="text" class="form-control"
                                                                   name="user" placeholder="Ошибка"
                                                                   value="{{$application->serviceApplications->pluck('service')->count() }} шт."
                                                                   disabled>
                                                        </div>

                                                        <div class="text-end" style="padding-top: 3%">
                                                            <button class="w-100 btn btn-primary">Сохранить <i
                                                                    class="fa-solid fa-pen"></i></button>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex flex-column justify-content-between">
                                                    <div class="card-body">

                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Дата оформления заявки</label>
                                                            <input type="text" class="form-control"
                                                                   name="data" placeholder="Ошибка"
                                                                   value="{{$application->date_application}}"
                                                                   disabled>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="status_id" class="form-label">Статус
                                                                заявки</label>
                                                            <select class="form-control" name="status_id"
                                                                    id="status_id">
                                                                @foreach($statuses as $cl)
                                                                    <option value="{{$cl->id}}"
                                                                            @if ($cl->id==$application->status_id) selected @endif>{{$cl->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="comment" class="form-label">Комментарий</label>
                                                            <textarea class="form-control" name="comment"
                                                                      id="comment"
                                                                      rows="4">{{$application->comment}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="table2" class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Услуга</th>
                                                    <th class="text-center">Цена</th>
                                                    <th class="text-center">Сотрудник</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($application->serviceApplications as $serviceApplication)
                                                    <tr class="align-middle">
                                                        <td>
                                                            <a class="btn btn-outline-primary w-100"
                                                               href="{{route("services.show",$serviceApplication->service->id)}}">{{ $serviceApplication->service->name }}</a>
                                                        </td>
                                                        <td class="text-center"> {{$serviceApplication->service->price}}
                                                            ₽
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group" style="margin: 0">
                                                                <form
                                                                    action="{{ route('admin.serviceApplications.update',  $serviceApplication) }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <select class="form-control" onchange="this.form.submit()" name="worker_id">
                                                                        @foreach($workers as $worker)
                                                                            @foreach($worker->myClasses->pluck('id')->toArray() as $w)
                                                                                @if ($w == $serviceApplication->service->class_id)
                                                                                    <option value="{{$worker->id}}"
                                                                                            class="text-center" {{ $serviceApplication->worker->name  == $worker->name ? 'selected': ''}}>{{$worker->name}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        @endforeach
                                                                    </select>
                                                                </form>
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
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection

