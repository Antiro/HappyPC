@extends('layouts.app')
@section('title', 'Happy PC | Регистрация')

@section('content')

    <header>
        <div class="banner banner-s2 banner-s2-inner" style="padding-top: 0">
            <div class="banner-block" style="padding-top: 5px; padding-bottom: 5px">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="ath-body bg-light" style="padding-top: 15px !important; margin-top: 0 !important;padding-bottom: 15px !important;">
                                <h5 class="ath-heading title" style="padding-top: 8px">Регистрация</h5>
                                <p>В <a href="{{route('home')}}">Happy PC</a></p>
                                <form class="" method="post" action="{{ route('register.store') }}">
                                    @csrf
                                    <div class="row">
                                        @error("errorRegister")
                                        <p><small class="text-danger">{{ $message }}</small></p>
                                        @enderror
                                        <div class="form-field col-md-6">
                                            <input type="text" name="name" placeholder="Имя (кириллица, пробел и тире)" value="{{ old('name') }}"
                                                   required pattern="^[А-Яа-яЁё\s\-]+$"
                                                   class="input bdr-b required @error('name') is-invalid @enderror">
                                            @error("name")
                                            <p><small class="text-danger">{{ $message }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-field col-md-6">
                                            <input type="text" name="surname" placeholder="Фамилия (кириллица, пробел и тире)" value="{{ old('surname') }}"
                                                   required pattern="^[А-Яа-яЁё\s\-]+$"
                                                   class="input bdr-b required @error('surname') is-invalid @enderror">
                                            @error("surname")
                                            <p><small class="text-danger">{{ $message }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-field col-md-12">
                                            <input type="tel" name="phone" placeholder="Номер телефона"
                                                   value="{{ old('phone') }}" required pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,25}$"
                                                   class="input bdr-b required @error('email') is-invalid @enderror">
                                            @error("phone")
                                            <p><small class="text-danger">{{ $message }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-field col-md-12">
                                            <input type="email" name="email" placeholder="Электронный адрес" value="{{ old('email') }}"
                                                   class="input bdr-b required @error('email') is-invalid @enderror">
                                            @error("email")
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-field col-md-12">
                                            <div class="form-text">Минимум 6 символов: латиница, цифры, одна заглавная, одна строчкая
                                            </div>
                                            <input type="password" name="password" placeholder="Пароль"
                                                   id="password"
                                                   class="input bdr-b required @error('password') is-invalid @enderror">
                                        </div>

                                        <div class="form-field col-md-12">
                                            <input type="password" name="password_confirmation"
                                                   placeholder="Повторите пароль (пароли должны совпадать)"
                                                   class="input bdr-b required @error('password_confirmation') is-invalid @enderror">

                                            @error("password")
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-field col-md-12 text-center">
                                            <button type="submit" class="btn">Зарегистрироваться</button>
                                            <p>Есть аккаунт? <a href="{{route('login')}}"> <strong>Войти здесь</strong></a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-image">
                <img src="{{asset('storage/add/shape-net-orage.png')}}" alt="banner">
            </div>
        </div>
    </header>

@endsection
