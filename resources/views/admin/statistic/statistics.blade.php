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
                                        <th class="text-center">id</th>
                                        <th class="text-center">Название</th>
                                        <th class="text-center">Описание</th>
                                        <th class="text-center">Класс</th>
                                        <th class="text-center">Цена</th>
                                        <th class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td class="text-center">{{$service->id}}</td>
                                            <td class="text-center">{{$service->name}}</td>
                                            <td class="text-center">{{$service->getShortDescriptionAttribute()}}</td>
                                            <td class="text-center">{{$service->ServiceClass->name}}</td>
                                            <td class="text-center">{{$service->price}}</td>
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
