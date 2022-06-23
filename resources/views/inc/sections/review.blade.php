<div class="section" style="padding-top: 0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-head">
                    <h2>Отзывы</h2>
                    <h5 class="heading-xs">клиентов нашей мастерской</h5>
                </div>
            </div>
        </div>

        <div class="tes tes-s3">
            <div class="row has-carousel" data-items="3" data-loop="true" data-auto="true" data-dots="true">
                {{--Reviews--}}
                @foreach($reviews as $review)
                <div class="tes-block">
                    <div class="tes-content bg-light shadow-alt" style="min-height: 250px">
                        <p>{{$review->text}}</p>
                    </div>
                    <div class="tes-author d-flex align-items-center">
                        <div class="author-image">
                            <img src="{{asset('storage/users')}}/{{$review->user->img->img}}" alt="{{$review->user->name}}">
                        </div>
                        <div class="author-con">
                            <h6 class="author-name t-u">{{ $review->user->surname == null ? '' : $review->user->surname  }} {{$review->user->name}}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
