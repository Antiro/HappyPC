@extends('layouts.admin')
@section('title', 'Услуги')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Услуги</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Услуги</li>
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
                                            Добавить новую запись
                                        </a>
                                    </h4>
                                </div>

                                <form action="{{ route('services.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div id="collapseNew" class="collapse row g-0" data-parent="#accordion">
                                        <div class="col-md-8 d-flex flex-column justify-content-between">
                                            <div class="card-body">

                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Название услуги</label>
                                                    <input type="text" class="form-control" id="name"
                                                           name="name" placeholder="введите название услуги"
                                                           value="{{ old('name') }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Описание</label>
                                                    <textarea class="form-control" name="description" id="description"
                                                              rows="3">{{ old('description') }}</textarea>
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
                                                    <label for="price" class="form-label">Цена</label>
                                                    <input type="number" class="form-control" id="price"
                                                           name="price" placeholder="введите цену услуги"
                                                           value="{{ old('price') }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Выберите файл</label>
                                                    <input class="form-control" type="file" id="image"
                                                           name="images[]" multiple
                                                           accept=".jpg,.jpeg,.png,.gif,.svg"
                                                           style="height: 44px">
                                                </div>

                                                <div class="text-end">
                                                    <button class="btn btn-primary">Создать</button>
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
                                        <th>id</th>
                                        <th>Название</th>
                                        <th>Описание</th>
                                        <th>Класс</th>
                                        <th>Цена</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->id}}</td>
                                            <td>{{$service->name}}</td>
                                            <td>{{$service->getShortDescriptionAttribute()}}</td>
                                            <td>{{$service->ServiceClass->name}}</td>
                                            <td>{{$service->price}}</td>
                                            <td class="text-center">

                                                <a class="btn bg-primary" href="{{ route('services.edit', $service) }}"><i class="fa-solid fa-pen"></i></a>

                                                <button class="btn bg-danger" type="button" data-toggle="modal"
                                                        data-target="#Modal{{$service->id}}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <div class="modal fade" id="Modal{{$service->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Уточните ответ</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Вы действительно хотите удалить запись?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Отмена</button>
                                                                <form action="{{route('services.destroy', $service)}}"
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

