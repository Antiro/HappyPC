<div class="section bg-me is-shadow" style="padding-top: 35px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="section-head section-md">
                    <h2>Партнеры</h2>
                    <h5 class="heading-xs">которые помогают нашей мастерской</h5>
                </div>
            </div>
        </div>

        <div class="row justify-content-center gutter-vr-40px">

            @foreach($sponsors as $sponsor)
                <div class="col-sm-3 col-5 text-center">
                    <div class="logo-item">
                        <a href="{{$sponsor->link}}" target="_blank"><img src="{{asset('storage')}}/{{$sponsor->img}}" draggable="false" alt="Sponsor"></a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
