@extends('layouts.app')
@section('title', 'Register')
@section('page', 'Register')

@section('content')

    <header>
        <div class="banner banner-s2 banner-s2-inner">
            <div class="banner-block">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="ath-body bg-light" style="padding-top: 15px !important; margin-top: 0 !important;">
                                <h5 class="ath-heading title">Регистрация</h5>
                                <p>В <a href="{{route('home')}}">Happy PC</a></p>
                                <form class="" method="post" action="{{ route('register.store') }}">
                                    @csrf
                                    <div class="row">
                                        @error("errorRegister")
                                        <p><small class="text-danger">{{ $message }}</small></p>
                                        @enderror
                                        <div class="form-field col-md-6">
                                            <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}" class="input bdr-b required @error('name') is-invalid @enderror">
                                        </div>

                                        <div class="form-field col-md-6">
                                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="input bdr-b required @error('email') is-invalid @enderror">
                                        </div>

                                        <div class="form-field col-md-12">
                                            <input type="tel" name="phone" placeholder="Телефон" value="{{ old('phone') }}" class="input bdr-b required @error('email') is-invalid @enderror">
                                        </div>

                                        <div class="form-field col-md-6">
                                            <input type="password" name="password" placeholder="Пароль" id="password" class="input bdr-b required @error('password') is-invalid @enderror">
                                        </div>

                                        <div class="form-field col-md-6">
                                            <input type="password" name="password_confirmation" placeholder="Повторите рароль"
                                                   class="input bdr-b required @error('password_confirmation') is-invalid @enderror">
                                        </div>

                                        <div class="form-field col-md-12">

                                            @error('name')
                                            <a><small class="text-danger">{{ $message }}</small></a><br>
                                            @enderror

                                            @error("password")
                                            <a><small class="text-danger">{{ $message }}</small></a><br><br>
                                            @enderror

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-field col-md-12">
                                            <button type="submit" class="btn">Зарегистрироваться</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="ath-note">
                                    Есть аккаунт? <a href="{{route('login')}}"> <strong>Войти здесь</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-image">
                    <img src="{{asset('storage/add/shape-net-orage.png')}}" alt="banner">
                </div>
            </div>
        </div>
    </header>

@endsection
