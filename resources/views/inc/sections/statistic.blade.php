<div class="section tc-light section-x section-counter">
    <div class="container">
        <br>
        <div class="row align-items-center gutter-vr-30px justify-content-center">

{{--            @foreach($statistics as $stat)--}}
            <div class="col-md-3 col-sm-6 col-6">
                <div class="tc-light counter">
                    <div class="counter-icon color-light">
                        <em class="ti-pencil-alt"></em>
                    </div>
                    <div class="counter-content">
                        <h2 class="mb-7 count" data-count="1">+{{$allApplications}}</h2>
                        <p>заявок &nbsp;&nbsp;</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6">
                <div class="tc-light counter">
                    <div class="counter-icon color-light">
                        <em class="ti-user"></em>
                    </div>
                    <div class="counter-content">
                        <h2 class="mb-7 count" data-count="0">+{{$readyApplications}}</h2>
                        <p>выполненных заявок &nbsp;&nbsp;</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6">
                <div class="tc-light counter">
                    <div class="counter-icon color-light">
                        <em class="ti-pencil-alt"></em>
                    </div>
                    <div class="counter-content">
                        <h2 class="mb-7 count" data-count="3">+{{$workApplications}}</h2>
                        <p>заявок в обработке &nbsp;&nbsp;</p>
                    </div>
                </div>
            </div>
{{--            @endforeach--}}

        </div>
    </div>

    <div class="bg-image bg-fixed">
        <img src="{{asset('storage/add/shape-net-orage.png')}}" alt="bg">
    </div>

</div>
