@extends('layouts.admin')
@section('title', "$service->name")

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Редактирование <a href="{{route("services.show",$service->id)}}" target="_blank">{{$service->name}}</a></h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.servicesAdminView')}}">Услуги</a></li>
                            <li class="breadcrumb-item active">{{$service->name}}</li>
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
                                                        action="{{ route('services.update', ['service' => $service]) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Название услуги</label>
                                                            <input type="text" class="form-control" id="name"
                                                                   name="name" placeholder="введите название услуги"
                                                                   value="{{$service->name}}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Описание</label>
                                                            <textarea class="form-control" name="description"
                                                                      id="description"
                                                                      rows="3">{{$service->description}}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="class_id" class="form-label">Вид работы</label>
                                                            <select class="form-control" name="class_id" id="class_id">
                                                                @foreach($myClasses as $cl)
                                                                    <option value="{{$cl->id}}"
                                                                            @if ($cl->id==$service->class_id) selected @endif>{{$cl->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Цена</label>
                                                            <input type="number" class="form-control" id="price"
                                                                   name="price" placeholder="введите цену услуги"
                                                                   value="{{$service->price}}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Выберите файл</label>
                                                            <input class="form-control" type="file" id="image"
                                                                   name="images[]" multiple
                                                                   accept=".jpg,.jpeg,.png,.gif,.svg"
                                                                   style="height: 44px">
                                                        </div>

                                                        <div class="text-end">
                                                            <button class="btn btn-primary">Обновить</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>


                                            <div class="col-md-4 text-center">

                                                <img src="{{old('image', asset('/storage/add/default.jpg')) }}"
                                                     class="img-fluid rounded-start img-create" alt="post"
                                                     id="showImage" draggable="false" style="max-width: 200px">
                                                <div class="row">
                                                    @foreach($service->imagesOfServices as $img)
                                                        <div class="col-6 text-center">
                                                            <img src="{{asset('storage')}}/{{$img['img']}}"
                                                                 alt="{{$service->name}}"
                                                                 style="max-width: 150px">

                                                            <button class="btn bg-danger" type="button" data-toggle="modal"
                                                                    data-target="#Modal{{$img->id}}"><i
                                                                    class="fa-solid fa-trash-can"></i></button>

                                                            <div class="modal fade" id="Modal{{$img->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Уточните ответ</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Вы действительно хотите удалить изображение?</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Отмена</button>
                                                                            <form
                                                                                action="{{route('admin.imagesOfServices.destroy', $img)}}"
                                                                                  method="post">
                                                                                @csrf
                                                                                @method("DELETE")
                                                                                <button class="btn btn-danger">Удалить</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
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

