@extends('layouts.app')
@section('title', 'Happy PC | Услуги')
@section('page', 'Услуги')

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.banner')
    </header>

    <main class="container">
        <div class="section section-x tc-grey bg-me is-shadow service">
            <div class="row">
                <div class="col-lg-7">
                    <h4 class="text-center">Фильтр</h4>
                    <ul class="project-filter project-md">
                        <li data-filter="3" class="active">Все виды</li>
                        <li data-filter="1">Модульный</li>
                        <li data-filter="2">Компонентный</li>
                    </ul>
                </div>
                <div class="col-lg-5 justify-content-end">
                    <h4 class="text-center">Вид</h4>
                    <ul class="project-filter project-md">
                        <li data-filter="3">Панели</li>
                        <li data-filter="4">Таблица</li>
                    </ul>
                </div>
            </div>

            <div class="project-area">
                <div class="row gutter-vr-20px justify-content-sm-center filtr-item" style="margin: 10px">
                    <div class="row project project-v5 no-gutters">
                        @foreach($services as $service)
                            <div class="col-lg-4 col-sm-6 text-center border-rad filtr-item"
                                 data-category="{{$service->ServiceClass->id}}, 3" style="opacity: 1">
                                <div class="post post-alt">

                                    <div class="post-thumb">
                                        <div class="team-image">
                                            <a href="{{route("services.show",$service->id)}}">
                                                <img
                                                    src="{{asset('storage')}}/{{$service->imagesOfServices[0]['img']}}"
                                                    alt="{{$service->name}}"
                                                    class="card-img" draggable="false">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="post-content">
                                        <h4>{{$service->name}}</h4>
                                        <p>{{$service->short_content}}</p>
                                        <p>{{$service->ServiceClass->name}} ремонт</p>
                                        <p><a href="{{route("services.show",$service->id)}}">Подробнее</a></p>
                                        <p>Цена {{$service->price}} ₽</p>
                                    </div>

                                </div>

                            </div>
                        @endforeach

                        <div class="col-lg-12 col-sm-12 filtr-item " data-category="4">
                            <div class="content-wrapper">
                                <div class="content">
                                    <div class="container-fluid">
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="table1" class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Название</th>
                                                        <th>Описание</th>
                                                        <th>Класс</th>
                                                        <th>Цена</th>
                                                        {{--<th>Действие</th>--}}
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($services as $service)
                                                        <tr>
                                                            <td>
                                                                <a href="{{route("services.show",$service->id)}}">{{$service->name}}</a>
                                                            </td>
                                                            <td>{{$service->getShortDescriptionAttribute()}}</td>
                                                            <td>{{$service->ServiceClass->name}}</td>
                                                            <td>{{$service->price}}</td>
                                                            {{--                                                            <td>--}}
                                                            {{--                                                                <lable for="chek"><input type="checkbox" name="chek">Добавить</lable>--}}
                                                            {{--                                                            </td>--}}
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    </body>

    @include('layouts.footer')

    {{--Tables--}}
    <script src="{{ asset('addAdmin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('addAdmin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('addAdmin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('addAdmin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('addAdmin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('addAdmin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('addAdmin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('addAdmin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('addAdmin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('addAdmin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('addAdmin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('addAdmin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function () {
            $('#table1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

@endsection
