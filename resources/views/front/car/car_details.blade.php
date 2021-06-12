@extends('front.layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="page-heading about-heading header-text"
         style="background-image: url({{asset('/slidebar/Slide2.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        {{--                        <h4>--}}
                        {{--                            <del>$11999.00</del>--}}
                        {{--                            <strong class="text-primary">$11779.00</strong></h4>--}}
                        {{--                        <h2>Lorem ipsum dolor sit amet</h2>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img src="{{asset($car->images->first()->path)}}" alt="" class="img-fluid wc-image">
                    </div>
                    <br>
                    <div class="row">
                        @forelse($car->images as $image)

                            @if(!$loop->first)
                                <div class="col-sm-4 col-6">
                                    <div>
                                        <img src="{{asset($image->path)}}" alt="" class="img-fluid">
                                    </div>
                                    <br>
                                </div>
                            @endif
                        @empty
                            <p> there is no images</p>
                        @endforelse

                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-12 d-flex justify-content-between align-items-center p-2 rounded text-white gap-2 bg-danger" >
                                <span>time: {{\Carbon\Carbon::parse(now())->format('h:m:s a')}}</span>
                                <span># Bid </span>
                                <span>High Bid</span>

                            </div>
                            <button type="button" class="btn btn-danger ml-5">Danger</button>
                        </div>

                    </div>

                </div>
                <div class="col-md-6">
                    <form action="#" method="post" class="form">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Type</span>

                                    <strong class="pull-right">New</strong>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">production date</span>

                                    <strong class="pull-right">{{$car->manufactured}}</strong>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left"> Model</span>

                                    <strong class="pull-right">{{$car->brand->name}}</strong>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">First registration</span>

                                    <strong class="pull-right">{{$car->registration_type}}</strong>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Mileage</span>

                                    <strong class="pull-right">{{$car->current_mileage}}</strong>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Fuel</span>

                                    <strong class="pull-right">{{$car->fuel_type}}</strong>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Engine size</span>

                                    <strong class="pull-right">{{$car->engine_capacity}} cc</strong>
                                </div>
                            </li>


                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Gearbox</span>

                                    <strong class="pull-right">{{$car->transmission}}</strong>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Number of seats</span>

                                    <strong class="pull-right">{{$car->seat}}</strong>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Doors</span>

                                    <strong class="pull-right">doors</strong>
                                </div>
                            </li>


                            <li class="list-group-item">
                                <div class="clearfix">
                                    <span class="pull-left">Color</span>

                                    <strong class="pull-right">{{$car->color}}</strong>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-heading">
                        <h2>Vehicle Description</h2>
                    </div>

                    <div class="left-content">
                        <p>- Colour coded bumpers<br>- Tinted glass<br>- Immobiliser<br>- Central locking - remote<br>-
                            Passenger airbag<br>- Electric windows<br>- Rear head rests<br>- Radio<br>- CD player<br>-
                            Ideal first car<br>- Warranty<br>- High level brake light<br>Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                            in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="section-heading">
                        <h2>Vehicle Extras</h2>
                    </div>

                    <div class="left-content">
                        <p>- ABS <br>-Leather seats <br>-Power Assisted Steering <br>-Electric heated seats <br>-New HU
                            and AU <br>-Xenon headlights</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{--    <div class="section">--}}
    {{--        <div class="container">--}}
    {{--            <div class="section-heading">--}}
    {{--                <h2>Imperfections</h2>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}
    {{--                @forelse($car->images as $image)--}}
    {{--                <div class="col-md-3 col-sm-4 col-12"  data-aos="fade-up">--}}
    {{--                    <div class="d-block photo-item" data-fancybox="gallery">--}}
    {{--                    <img src="{{asset($image->path)}}"  width="100%" height="100%" alt="" class="img-fluid">--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                @empty--}}
    {{--                    there is no image.--}}
    {{--                @endforelse--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--        </div>--}}


    <div class="happy-clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Imperfections</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-clients owl-carousel text-center">
                            @forelse($car->images as $image)
                                <div class="service-item">
                                    <div>
                                        <img src="{{asset($image->path)}}" width="100%" height="100%" alt=""
                                             class="img-fluid"></div>
                                </div>
                            @empty
                                there is no image.
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="section-heading">
                                <h2>Contact Details</h2>
                            </div>

                            <div class="left-content">
                                <p>
                                    <span>Name</span>

                                    <br>

                                    <strong>John Smith</strong>
                                </p>

                                <p>
                                    <span>Phone</span>

                                    <br>

                                    <strong>
                                        <a href="tel:123-456-789">123-456-789</a>
                                    </strong>
                                </p>

                                <p>
                                    <span>Mobile phone</span>

                                    <br>

                                    <strong>
                                        <a href="tel:456789123">456789123</a>
                                    </strong>
                                </p>

                                <p>
                                    <span>Email</span>

                                    <br>

                                    <strong>
                                        <a href="mailto:john@carsales.com">john@carsales.com</a>
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection
