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
                                        <th>Услуга</th>
                                        <th>Пользователь</th>
                                        <th>Отзыв</th>
                                        <th>Оценка</th>
                                        <th>Статус</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($reviews as $review)
                                        <tr>
                                            <td>{{$review->id}}</td>
                                            <td>{{$review->service->name}}</td>
                                            <td>{{$review->user->name}}</td>
                                            <td>{{$review->getShortTextAttribute()}}</td>
                                            <td>{{$review->evaluation->name}}</td>
                                            <td>{{$review->status->name}}</td>
                                            <td class="text-center">

                                                <a class="btn bg-primary" href="{{ route('services.edit', $review) }}"><i class="fa-solid fa-pen"></i></a>

                                                <button class="btn bg-danger" type="button" data-toggle="modal"
                                                        data-target="#Modal{{$review->id}}"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                                <div class="modal fade" id="Modal{{$review->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <form action="{{route('services.destroy', $review)}}"
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
