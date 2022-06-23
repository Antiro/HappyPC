@extends('layouts.app')
@section('title', 'Happy PC | Вход в админ панель')

@section('content')
    <header class="is-transparent is-sticky is-shrink" id="header">
        <div class="banner banner-s2 banner-s2-inner">
            <div class="banner-block">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="ath-body bg-light">
                                <h2 class="title">Войти в админ-панель</h2>
                                <p><a href="{{route('home')}}">Happy PC</a></p>
                                <form method="post" action="{{ route('admin.login.check') }}">
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
                                    </div>
                                </form>
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
