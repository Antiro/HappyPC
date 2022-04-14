@extends('layouts.admin')
@section('title', "Заявка №$application->id")

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактирование записи</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.ApplicationsAdminView')}}">Заявки</a></li>
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
                                        <div class="row g-0">
                                            <div class="col-md-8 d-flex flex-column justify-content-between">
                                                <div class="card-body">
                                                    <form
                                                        action="{{ route('applications.update', ['application' => $application]) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Название услуги</label>
                                                            <input type="text" class="form-control" id="name"
                                                                   name="name" placeholder="Ошибка"
                                                                   value="{{$application->service->name}}" disabled>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="user" class="form-label">Пользователь</label>
                                                            <input type="text" class="form-control"
                                                                   name="user" placeholder="Ошибка"
                                                                   value="{{$application->user->name}}" disabled>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="comment" class="form-label">Комментарий</label>
                                                            <textarea class="form-control" name="comment"
                                                                      id="comment"
                                                                      rows="3">{{$application->comment}}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="status_id" class="form-label">Статус заявки</label>
                                                            <select class="form-control" name="status_id" id="status_id">
                                                                @foreach($statuses as $cl)
                                                                    <option value="{{$cl->id}}"
                                                                            @if ($cl->id==$application->status_id) selected @endif>{{$cl->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="text-end">
                                                            <button class="btn btn-primary">Обновить</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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

