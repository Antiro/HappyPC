@extends('layouts.admin')
@section('title', 'Спонсоры')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Спонсоры</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Спонсоры</li>
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
                                        <th>Ссылка</th>
                                        <th>Изображение</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sponsors as $sponsor)
                                        <tr>
                                            <td>{{$sponsor->id}}</td>
                                            <td>{{$sponsor->link}}</td>
                                            <td>{{$sponsor->img}}</td>
                                            <td class="text-center">
                                                <button class="btn bg-danger"><i class="fa-solid fa-trash-can"></i></button>
                                                <button class="btn bg-primary"><i class="fa-solid fa-pen"></i></button>
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
