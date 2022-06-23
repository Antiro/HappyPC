@extends('layouts.app')
@section('title', 'Happy PC | Услуги')
@section('page', 'Услуги')

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.banner')
    </header>

    <main class="container-big">
        <div class="bg-me is-shadow service">
            <div class="row justify-content-center gutter-vr-30px">
                <div class="col-lg-4 col-sm-12">
                    <div class="card border-0" style="min-width: 250px">
                        <div class="card-body bg-white shadow">
                            <form action="{{ route('category.services.form') }}">
                                {{-- Категории--}}
                                <h3 style="margin-bottom: 20px">Вид ремонта</h3>

                                <div class="btn-group-vertical mb-4 pe-2 d-flex flex-column text-center">
                                    @foreach($classes as $class)

                                        <div class="form_radio_btn w-100 text-center" style="margin-bottom: 2%">
                                            <input type="radio" name="class" value="{{ $class->id }}"
                                                   id="{{ $class->id }}"
                                                   onchange="this.form.submit()"{{ old('class') == $class->id ? 'checked': ''}}>
                                            <label class="form-check-label w-100"
                                                   style="padding: 0;margin: 0"
                                                   for="{{ $class->id }}">{{ $class->name }}</label>
                                        </div>

                                    @endforeach
                                </div>
                                <h4 style="margin-top: 20px">Сортировка</h4>
                                <div class="btn-group-vertical mb-4 pe-2 d-flex flex-column text-center">
                                    <select class="form-select w-100" name="course" id="course" onchange="this.form.submit()">
                                        @foreach(['asc' => 'По возрастанию', 'desc' => 'По убыванию'] as $course=>$text)
                                            <option
                                                class="text-center"
                                                value="{{ $course }}" {{ old('course') == $course ? 'selected': ''}} >
                                                {{ $text }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <ul class="list-group pe-2 mb-4">
                                    @foreach(['price' => 'По цене', 'name' => 'По названию'] as $order=>$text)
                                        <div class="form_radio_btn w-100 text-center" style="margin-bottom: 2%">
                                            <input class="w-100" type="radio" name="order"
                                                   id="{{ $order }}"
                                                   value="{{ $order }}"
                                                   onchange="this.form.submit()"{{ old('order') == $order ? 'checked' : ''}}>
                                            <label class="form-check-label w-100"
                                                   for="{{ $order }}">{{ $text }} </label>
                                        </div>
                                    @endforeach
                                </ul>
                            </form>

                            <a class="btn btn-danger" style="margin-top:3%; width: 98%; text-transform: none;"
                               href="{{ route('services.index') }}">Сбросить фильтр</a></div>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="row" style="margin-bottom: 1%">
                        <div class="col-lg-6 col-sm-6">
                            <h3> Найдено {{count((old('services') ?? $services))}} записей</h3>
                        </div>
                        <div class="col-lg-6 col-sm-6 text-right" style="height: 70px;">
                            <button class="btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample"
                                    aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa-regular fa-square"></i>
                            </button>
                            <button class="btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample"
                                    aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa-solid fa-table-list"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row justify-content-center gutter-vr-30px collapse show" id="collapseExample">
                            @foreach((old('services') ?? $services) as $service)
                                <div class="col-lg-4 col-sm-5" style="min-width: 260px">
                                    <div class="card shadow">
                                        <div style="min-height: 200px; text-align: center">
                                            <a href="{{route("services.show",$service->id)}}">
                                                <img
                                                    src="{{asset('storage')}}/{{$service->imagesOfServices[0]['img']}}"
                                                    alt="{{$service->name}}" class="slideImg">
                                            </a>
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{$service->name}}</h5>
                                            <p style="font-weight: bold;font-size: 18px;padding-top: 5px">
                                                Цена {{$service->price}} ₽</p>
                                            <a href="{{route("services.show",$service->id)}}"
                                               class="btn w-100">Побробнее</a>
                                            @auth
                                                <a href="#" class="btn w-100 btn-add-product"
                                                   id="{{ $service->id }}">Добавить
                                                    в <i class="fa-solid fa-basket-shopping"></i></a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="collapse" id="collapseExample">
                            <div class="card">
                                <div class="card-body">
                                    <table id="table1" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Название</th>
                                            <th class="text-center">Класс</th>
                                            <th class="text-center">Цена</th>
                                            @auth
                                                <th class="text-center">Действие</th>
                                            @endauth
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($services as $service)
                                            <tr>
                                                <td>
                                                    <a href="{{route("services.show",$service->id)}}">{{$service->name}}</a>
                                                </td>
                                                <td class="text-center">{{$service->ServiceClass->name}}</td>
                                                <td class="text-center">{{$service->price}}</td>
                                                @auth
                                                    <td class="text-center">
                                                        <a href="#" class="btn w-100 btn-add-product"
                                                           id="{{ $service->id }}"><i
                                                                class="fa-solid fa-basket-shopping"></i></a>
                                                    </td>
                                                @endauth
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
    </main>
    </body>

    @include('layouts.footer')
@include('inc.table')

@endsection
@push('script')

    <script>
        async function postDataJS(route, data, _token) {
            let response = await fetch(route,
                {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8',
                    },
                    body: JSON.stringify({data, _token})
                });
            return await response.json();
        }

        document.querySelectorAll('.btn-add-product').forEach(item => {
            item.addEventListener('click', async (e) => {
                e.preventDefault()
                await postDataJS('{{ route('basket.plus') }}', e.target.id, '{{ csrf_token() }}');
            })
        })
    </script>

@endpush

