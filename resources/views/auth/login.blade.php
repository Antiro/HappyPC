@extends('layouts.app')
@section('title', 'Login')
@section('page', 'Login')

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        <div class="banner banner-s2 banner-s2-inner">
            <div class="banner-block">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="ath-body bg-light">
                                <h5 class="ath-heading title">Войти</h5>
                                <p>В свой акканут <a href="{{route('home')}}">Happy PC</a></p>
                                <form class="" method="post" action="{{route('login.check')}}">
                                    @csrf
                                    <div class="form-results">
                                        @error("errorLogin")
                                        <p><small class="text-danger">{{ $message }}</small></p>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-field col-md-12">
                                            @error("email")
                                            <p><small class="text-danger">{{ $message }}</small></p>
                                            @enderror
                                            <input type="email" name="email" placeholder="Email"
                                                   value="{{ old('email') }}"
                                                   class="input bdr-b required @error('email') is-invalid @enderror">
                                        </div>
                                        <div class="form-field col-md-12">
                                            @error("password")
                                            <p><small class="text-danger">{{ $message }}</small></p>
                                            @enderror
                                            <input type="password" name="password" placeholder="Пароль"
                                                   class="input bdr-b required @error('password') is-invalid @enderror">
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-field col-md-6">
                                            <button type="submit" class="btn">Войти</button>
                                        </div>

{{--                                        <div class="form-field col-md-6 align-self-center">--}}
{{--                                            <input class="check" type="checkbox" name="remember"--}}
{{--                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                            <label class="form-check-label" for="remember">--}}
{{--                                                запомнить меня--}}
{{--                                            </label>--}}
{{--                                        </div>--}}

                                    </div>
                                </form>
                                <div class="ath-note">
                                    Нет аккаунта? <a href="{{route('register.index')}}"><strong>зарегистрироваться
                                            здесь</strong></a>
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
