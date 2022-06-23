<div class="section" style="padding-top: 25px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-head">
                    <h2>Наши услуги</h2>
                </div>
            </div>
        </div>
        @foreach($services as $service)
            @if ($service->id % 2 == 1)
                <div class="row gutter-vr-30px">

                    <div class="col-md-6">
                        <div class="bg-img">
                            <div class="bg-image">
                                <img src="{{asset('storage')}}/{{$service->imagesOfServices[0]['img']}}" alt="img">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="text-block fw-3 tc-light bg-primary block-pad-xl is-shadow text-center">

                            <h2>{{$service->name}}</h2>
                            <p>{{$service->description}}</p>
                            <a href="{{route("services.show",$service->id)}}" class="btn btn-outline">Побробнее</a>

                        </div>
                    </div>

                </div>
            @else
                <div class="row gutter-vr-30px">
                    <div class="col-md-6">
                        <div class="text-block fw-3 bg-me block-pad-xl is-shadow text-center">

                            <h2>{{$service->name}}</h2>
                            <p>{{$service->description}}</p>
                            <a href="{{route("services.show",$service->id)}}" class="btn">Побробнее</a>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-img">
                            <div class="bg-image">
                                <img src="{{asset('storage')}}/{{$service->imagesOfServices[0]['img']}}" alt="img">
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        @endforeach
        <div class="row">
            <div class="col-12 text-center">
                <div class="button-area button-area-sm">
                    <a href="{{route('services.index')}}" class="btn">Все услуги</a>
                </div>
            </div>
        </div>
    </div>
</div>
