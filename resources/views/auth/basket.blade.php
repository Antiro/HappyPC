@extends('layouts.app')
@section('title', 'Happy PC | Корзина')

@section('content')

    <header class="is-transparent is-sticky is-shrink" id="header">
        @include('layouts.header')
        @include('inc.bannerU')
    </header>

    <div class="section tc-grey bg-me is-shadow profile row" style="padding: 20px 10px 5px 10px; margin-top:2%" id="career">
        <div style="padding: 20px; width: 100%">
            <div class="row mt-5">
                <div class="col-md-128 col-lg-12 mb-4" style="padding-bottom: 2%">
                    <h3>Корзина <span class="badge bg-primary count-basket"></span></h3> <h5 class="text-danger">
                        Внимание! Доставка не входит в стоимость услуг и оплачивается за ваш счет!</h5>
                </div>
                <div class="col-md-8 col-lg-8 mb-4">
                    <table class="table table-hover">
                        <tbody>
                        @foreach($basketServices as $basket)
                            <tr class="align-middle">

                                <td class="col-2">
                                    <a href="{{route("services.show",$basket->service->id)}}">
                                        <img
                                            src="{{asset('storage')}}/{{$basket->service->imagesOfServices[0]['img']}}"
                                            alt="{{$basket->service->name}}" class="slideImg"
                                            style="max-height: 100px">
                                    </a>
                                </td>

                                <td class="col-10">
                                    <div
                                        class="d-flex flex-lg-row justify-content-lg-between align-items-lg-center ps-5 pe-3 flex-column">
                                        <div class="order-1 order-lg-0">
                                            <h5 class="card-title">{{ $basket->service->name }}</h5>
                                            <div>
                                                <form
                                                    action="{{ route('basket.minus', $basket) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group-sm" role="group">
                                                        <button type="submit" class="btn px-3" style="color: white"> Удалить</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="order-0 order-lg-1 mb-2">
                                            <div>
                                                <strong class="card-price me-2">{{ $basket->service->price }}</strong>₽
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title d-flex justify-content-between">
                                <span>Итого: </span><span id="totalPrice"></span>
                            </h4>
                            {{--                        <p class="mb-4">В корзине <span class="count-basket"></span> услуг </p>--}}
                            <form class="" method="post" action="{{ route('application.create') }}">
                                @csrf
                                <p class="text-center" style="font-size: 15px;padding-top: 1%">Для оформления заказа
                                    необходимо ввести пароль</p>
                                <div class="input-group mt-2">
                                    <input type="password" name="password"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="пароль..."
                                           id="password">
                                </div>

                                <div class="d-grid mt-2">
                                    <button type="submit" style="margin-top: 2%" class="btn w-100 px-3">
                                        оформить заказ
                                    </button>
                                </div>

                                <div class="text-center text-danger" style="padding: 2% 0 2% 0">
                                    <a>Внимание!</a>
                                    <p>Если вы из другого города то необходимо указать об этом в комментариях к
                                        заявке.</p>
                                </div>

                                <div class="input-group mt-2">
                                    <textarea name="comment" class="form-control">Комментарий к заявке.</textarea>
                                </div>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

        const $ = (selector) => {
            return document.getElementById(selector)
        }

        let basketServices = @json($basketServices);
        let formLogin = $('formLogin');

        getTotalPrice(basketServices)

        function showResult(service_id, service) {
            $('count-' + service_id).textContent = service.count
            $('price-' + service_id).textContent = ~~service.price

            getTotalPrice(basketServices)
        }

        function getTotalPrice(basketServices) {
            let totalPrice = basketServices.reduce((sum, item) => sum + item.service.price, 0);
            let totalCount = basketServices.reduce((sum, item) => basketServices.length, 0);
            document.querySelectorAll('.count-basket').forEach(el => {
                el.textContent = totalCount
            });
            $('totalPrice').textContent = ` ${~~totalPrice} ₽`;
        }

        {{--async function calcDec(key, service_id) {--}}
        {{--    let service = await postDataJS('{{ route('basket.minus') }}', service_id, '{{ csrf_token() }}');--}}
        {{--    basketServices[key].count = service.count;--}}
        {{--    showResult(service_id, service)--}}
        {{--}--}}

    </script>

@endpush


