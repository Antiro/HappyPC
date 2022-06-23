@extends('layouts.admin')
@section('title', "$worker->name")

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Сотрудник {{$worker->name}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.workersAdminView')}}">Сотрудники</a>
                            </li>
                            <li class="breadcrumb-item active">{{$worker->name}}</li>
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
                                            action="{{ route('workers.update', ['worker' => $worker]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row g-0">
                                                <div class="col-md-6 d-flex flex-column justify-content-between">
                                                    <div class="card-body">

                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Имя</label>
                                                            <input type="text" class="form-control"
                                                                   name="name" placeholder="Ошибка"
                                                                   value="{{$worker->name}}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="class_id" class="form-label">Вид работы</label>
                                                            <select class="form-control" name="class_id" id="class_id">
                                                                @foreach($myClasses as $cl)
                                                                    <option value="{{$cl->id}}" {{ $worker->myClasses->pluck('id')[0]  == $cl->id ? 'selected': ''}}>{{$cl->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Выберите файл</label>
                                                            <input class="form-control" type="file" id="image"
                                                                   name="image"
                                                                   accept=".jpg,.jpeg,.png,.gif,.svg"
                                                                   style="height: 44px">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Комментарий</label>
                                                            <textarea class="form-control" name="description"
                                                                      id="description"
                                                                      rows="5">{{$worker->description}}</textarea>
                                                        </div>

                                                        <div class="text-end">
                                                            <button class="w-100 btn btn-primary">Сохранить <i
                                                                    class="fa-solid fa-pen"></i></button>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex flex-column justify-content-between">
                                                    <div class="card-body text-center">
                                                            <img src="{{asset('storage')}}/{{$worker->img}}"
                                                                 class="img-fluid rounded-start img-create" alt="post"
                                                                 id="showImage" draggable="false" style="max-width: 300px">

                                                        <p style="margin-top: 3%">Фото сотрудника</p>

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
                                            <table id="table1" class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Заявка</th>
                                                    <th class="text-center">Услуга</th>
                                                    <th class="text-center">Статус</th>
                                                    <th class="text-center">Дата</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($services as $service)
                                                    <tr class="align-middle">
                                                        <td>
                                                            <a class="btn btn-outline-primary w-100"
                                                               href="{{ route('applications.edit', $service->application_id) }}">{{$service->application_id}}</a>
                                                        </td>
                                                        <td class="text-center">
                                                            {{$service->service->name}}
                                                        </td>
                                                        <td class="text-center">
                                                            {{$service->application->status->name}}
                                                        </td>
                                                        <td class="text-center">
                                                            {{$service->application->date_application}}
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

