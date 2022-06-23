@extends('layouts.admin')
@section('title', 'Сотрудники')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Сотрудники</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Сотрудники</li>
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
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card-body">
                        <div id="accordion">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 text-center" data-toggle="collapse"
                                           href="#collapseNew">
                                            Добавить нового сотрудника
                                        </a>
                                    </h4>
                                </div>

                                <form action="{{ route('workers.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div id="collapseNew" class="collapse row g-0" data-parent="#accordion">
                                        <div class="col-md-8 d-flex flex-column justify-content-between">
                                            <div class="card-body">

                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Имя</label>
                                                    <input type="text" class="form-control" id="name"
                                                           name="name" placeholder="Имя сотрудника"
                                                           value="{{ old('name') }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="class_id" class="form-label">Вид работы</label>
                                                    <select class="form-control" name="class_id" id="class_id">
                                                        @foreach($myClasses as $cl)
                                                            <option value="{{$cl->id}}">{{$cl->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Описание</label>
                                                    <input type="text" class="form-control" id="name"
                                                           name="description" placeholder="Описание сотрудника"
                                                           value="{{ old('description') }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Выберите файл</label>
                                                    <input class="form-control" type="file" id="image"
                                                           name="image"
                                                           accept=".jpg,.jpeg,.png,.gif,.svg"
                                                           style="height: 44px">
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-primary">Добавить</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4" style="padding: 2%">
                                            <img src="{{old('image', asset('/storage/add/default.jpg')) }}"
                                                 class="img-fluid rounded-start img-create" alt="post"
                                                 id="showImage" draggable="false">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="table1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">id</th>
                                        <th class="text-center">Имя</th>
                                        <th class="text-center">Класс</th>
                                        <th class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($workers as $worker)
                                        <tr>
                                            <td class="text-center">{{$worker->id}}</td>
                                            <td class="text-center">{{$worker->name}}</td>
                                            <td class="text-center">{{$worker->implodeClasses($worker)}}</td>
                                            <td class="text-center">

                                                <a class="btn bg-primary" href="{{ route('workers.edit', $worker) }}"><i class="fa-solid fa-magnifying-glass"></i></a>

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
