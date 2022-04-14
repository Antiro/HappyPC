<div class="section section-x bg-me is-shadow">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="section-head section-md">
                    <h2>Команда</h2>
                    <h5 class="heading-xs">В нашей мастерской работают только лучшие специалисты</h5>
                </div>
            </div>
        </div>

        <div class="row justify-content-center gutter-vr-30px">
            @foreach($workers as $worker)
                <div class="col-lg-3 col-sm-5">
                    <div class="team-single text-center">
                        <a href="{{route("team.show",$worker->id)}}">
                            <div class="team-image is-shadow">
                                <img src="{{asset('storage')}}/{{$worker->img}}" alt="{{$worker->name}}">
                            </div>
                            <div class="team-content team-content-s2">
                                <h5 class="team-name">{{$worker->name}}</h5>
                                <p>
                                    {{$worker->implodeClasses($worker)}} ремонт
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="button-area button-area-sm">
                    <a href="{{route('team.index')}}" class="btn">Вся команда</a>
                </div>
            </div>
        </div>
    </div>
</div>
