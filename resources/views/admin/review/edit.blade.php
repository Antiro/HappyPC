@extends('layouts.admin')
@section('title', "Заявка №$review->id")

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Отзыв №{{$review->id}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.ReviewsAdminView')}}">Отзывы</a></li>
                            <li class="breadcrumb-item active">Отзыв №{{$review->id}}</li>
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
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
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
                                <div class="row g-0">
                                    <div class="col-md-12 d-flex flex-column justify-content-between">
                                        <form
                                            action="{{ route('admin.updateReviewAdmin', ['review' => $review]) }}"
                                            method="get">
                                            @csrf
                                            <div class="row g-0">
                                                <div class="col-md-6 d-flex flex-column justify-content-between">
                                                    <div class="card-body">

                                                        <div class="mb-3">
                                                            <label for="status_id" class="form-label">Статус заявки</label>
                                                            <select class="form-control" name="status_id"
                                                                    id="status_id">
                                                                @foreach($statuses as $cl)
                                                                    <option value="{{$cl->id}}"
                                                                            @if ($cl->id==$review->status_id) selected @endif>{{$cl->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="application_id" class="form-label">Номер заявки</label>
                                                            <input type="text" class="form-control"
                                                                   name="application_id" placeholder="Ошибка"
                                                                   value="{{$review->application_id}}"
                                                                   disabled>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="user_id" class="form-label">Заказчик</label>
                                                            <input type="text" class="form-control"
                                                                   name="user_id" placeholder="Ошибка"
                                                                   value="{{$review->user->name}} ({{$review->user->id}})" disabled>
                                                        </div>


                                                        <div class="mb-3">
                                                            <label for="service_id" class="form-label">Услуга</label>
                                                            <input type="text" class="form-control"
                                                                   name="service_id" placeholder="Ошибка"
                                                                   value="{{$review->service->name}} ({{$review->service->id}})"
                                                                   disabled>
                                                        </div>

                                                        <div class="text-end">
                                                            <button class="w-100 btn btn-primary">Сохранить <i class="fa-solid fa-pen"></i></button>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex flex-column justify-content-between">
                                                    <div class="card-body">

                                                        <div class="mb-3">
                                                            <label for="evaluation_id" class="form-label">Оценка</label>
                                                            <input type="text" class="form-control"
                                                                   name="evaluation_id" placeholder="Ошибка"
                                                                   value="{{ $review->evaluation == null ? 'Нет оценки' : $review->evaluation->name  }}"
                                                                   disabled>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="text" class="form-label">Комментарий</label>
                                                            <textarea class="form-control" name="text"
                                                                      id="text" disabled
                                                                      rows="11">{{$review->text}} </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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

