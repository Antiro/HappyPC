@extends('layouts.app')
@section('title', "Happy PC | Заявка № $application->id")

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.bannerU')
    </header>
    <div class="section tc-grey bg-me is-shadow profile row" style="padding: 20px; margin-top:2%" id="career">

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Удалить</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Вы действительно хотите удалить(отменить) заявку?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <form
                            action="{{ route('application.NewDestroy', $application) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger me-2 w-25">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 text-center" style="padding-bottom: 2%">
            <h4 class="mb-2" style="padding-bottom: 2%">Заявка № {{ $application->id }}</h4>
            <p>Дата заказа: {{ $application->date_application }}</p>
            <p class="mb-2">Итоговая стоимость:
                <strong>
                    {{ $application->serviceApplications->pluck('service')->pluck('price')->sum() }}₽
                </strong>
            </p>
            <textarea disabled style="margin: 6% 0 6% 0">{{$application->comment}}</textarea>
            <div>
                <a href="{{route('profileApplications')}}" class="btn btn-sm me-2 w-25">Назад</a>
                @if($application->status->name == 'В обработке')

                    <button type="button" class="btn btn-sm btn-danger me-2 w-25" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                        Удалить
                    </button>

                @endif
            </div>
        </div>

        <div class="col-md-9 col-sm-12">
            <table class="table table-hover table-bordered">

                <thead>
                <tr class="text-center">
                    <th class="col-3">Услуга</th>
                    <th class="col-2">Цена</th>
                    <th class="col-2">Сотрудник</th>
                </tr>
                </thead>

                <tbody>
                @foreach($application->serviceApplications as $serviceApplication)
                    <tr class="align-middle">
                        <td><a class="btn w-100"
                               href="{{route("services.show",$serviceApplication->service->id)}}">{{ $serviceApplication->service->name }}</a>
                        </td>
                        <td class="text-center"> {{$serviceApplication->service->price}} ₽</td>
                        <td class="text-center"> {{ $serviceApplication->worker->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
