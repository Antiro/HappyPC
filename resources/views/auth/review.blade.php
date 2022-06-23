@extends('layouts.app')
@section('title', "Happy PC | Заявка № $review->id")

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.bannerU')
    </header>
    <div class="section tc-grey bg-me is-shadow profile row" style="padding: 20px; margin-top:2%" id="career">

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

        <div class="col-md-3 col-sm-12 text-center" style="padding-bottom: 2%">
            <h4 class="mb-2" style="padding-bottom: 2%">Отзыв №{{ $review->id }}</h4>
            <h4 class="mb-2" style="padding-bottom: 2%">Услуга: {{ $review->service->name }}</h4>
            <p>
                Статус: <strong>{{ $review->status->name }}</strong><br>
                Дата: {{ $review->date_review }}
            </p>
            <div>
                <a href="{{ route('profileReviews')}}#career-three" class="btn btn-sm me-2 w-25">Назад</a>
            </div>
        </div>

        <div class="col-md-9 col-sm-12">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="ath-body bg-light is-shadow" style="padding: 20px">
                        <h5 class="ath-heading title">Оставить отзыв</h5>
                        <form method="post" action="{{ route('review.update',$review)}}">
                            @method('PATCH')
                            @csrf
                            <div class="row">

                                <input type="text" name="user" id="user" value="{{$review->user->id}}"
                                       style="display: none">

                                <input type="text" name="service" id="service" value="{{$review->service->id}}"
                                       style="display: none">

                                <div class="form-field col-md-9">
                                    <textarea name="text" cols="40" rows="3"
                                              maxlength="40">{{$review->text}}</textarea>
                                </div>

                                <div class="form-field col-md-2 text-center" style="margin-right: 1px;margin-left: 2%">

                                    <div class="like">
                                        <input id="radio-1" type="radio" name="evaluation" value="1"
                                            {{ $review->evaluation_id == 1 ? 'checked' : '' }} >
                                        <label for="radio-1" class="btn">Like</label>
                                    </div>

                                    <div class="dislike">
                                        <input id="radio-2" type="radio" name="evaluation" value="2"
                                            {{ $review->evaluation_id == 2 ? 'checked' : '' }}
                                        >
                                        <label for="radio-2" class="btn">Dislike</label>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-field col-md-12 text-center">
                                    <button type="submit" class="btn" id="btnSubmit" {{ $review->evaluation_id != null ? '' : 'disabled' }}>Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        document.getElementById('radio-1').addEventListener('click', (e) => {
            document.getElementById('btnSubmit').disabled = !e.target.checked;
        })

        document.getElementById('radio-2').addEventListener('click', (e) => {
            document.getElementById('btnSubmit').disabled = !e.target.checked;
        })
    </script>

@endsection
