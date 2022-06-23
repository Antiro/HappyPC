<footer class="section bg-me footer">
    <div class="container">
        <div class="row" style="padding-top: 10px;">
            <div class="col-lg-4" style="padding-bottom: 30px">
                <div class="wgs">
                    <div class="wgs-content text-center ">

                        <ul class="wgs-menu" style="font-size: 15px">
                            <li><a href="{{route('home')}}">
                                    <img src="{{asset('storage/logo/logo3MM.png')}}"
                                         srcset="{{asset('storage/logo/logo3MM.png')}}" alt="logo"
                                         draggable="false"
                                         style="height: 40px">
                                </a></li>
                            <li><a href="{{route('about')}}">О нас</a></li>
                            <li><a href="{{route('services.index')}}">Услуги</a></li>
                            <li><a href="{{route('team.index')}}">Команда</a></li>
                            <li><a href="{{route('contacts')}}">Контакты</a></li>
                            <li><a href="{{route('delivery')}}">Доставка</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8" style="font-size: 14px">
                <div class="feature-icon text-center">
                    <i class="fa-solid fa-square-phone"></i>
                </div>
                <div class="text-center">
                    <a>Заявки на ремнот: +7 (904) 088-88-88</a>
                </div>
                <div class="text-center">
                    <a>По вопросам сборки ПК: +8 (904) 080-88-88</a>
                </div>

                <div class="row justify-content-center gutter-vr-30px" style="padding-top: 30px">
                    @foreach($contacts as $contact)
                        <div class="col-lg-2 col-sm-6 text-center" style="max-width: 90px">
                            <div class="feature-icon">
                                <a href="{{$contact->link}}" target="_blank">
                                    <em class="{{$contact->icon}}"></em>
                                    <p style="font-size: 13px !important; padding-top: 15px">{{$contact->name}}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-12 text-center" style="margin-top: 50px">
            <p style="font-size: 10px">&copy; 2022 HappyPC. Все права защищены<br> Разаработан и создан by <a
                    href="https://vk.com/andrey_antero" target="_blank">Antero</a></p>
            </div>
        </div>
    </div>
</footer>


