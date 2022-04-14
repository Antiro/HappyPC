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
                                        <th>Название</th>
                                        <th>Заказчик</th>
                                        <th>Комментарий</th>
                                        <th>Статус</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($applications as $application)
                                        <tr>
                                            <td>{{$application->id}}</td>
                                            <td>{{$application->service->name}}</td>
                                            <td>{{$application->user->name}}</td>
                                            <td>{{$application->getShortCommentAttribute()}}</td>
                                            <td>{{$application->status->name}}</td>
                                            <td class="text-center">

                                                <a class="btn bg-primary" href="{{ route('applications.edit', $application) }}"><i class="fa-solid fa-pen"></i></a>

                                                <button class="btn bg-danger" type="button" data-toggle="modal"
                                                        data-target="#Modal{{$application->id}}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <div class="modal fade" id="Modal{{$application->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <form action="{{route('applications.destroy', $application)}}"
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

