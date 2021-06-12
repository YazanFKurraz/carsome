@extends('front.layouts.app')
@section('content')


    <div class="latest-products">
        <div class="container">
            <nav class="navbar navbar-light  justify-content-between align-items-center rounded  " style="background-color:#1e1e1e;">
                <a class="navbar-brand text-light  py-2 mt-1">Featured Cars</a>
                <form class="form-inline" action="{{route('cars.index')}}" method="get">
                  @csrf
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
            <br>

            <div class="row">
                <div class="col-md-12 ">
{{--                    <div class="section-heading">--}}
{{--                        <h2></h2>--}}
{{--                        <a href="cars.html">view more <i class="fa fa-angle-right"></i></a>--}}
{{--                    </div>--}}
                </div>
                @foreach($cars as $car)
                <div class="col-lg-4 col-md-6 ">

                    <div class="product-item ">
                        <a href="{{route('cars.show',$car)}}"><img src="{{asset(@$car->images->first()->path )}}" alt="لا يوجد صورة"></a>
                            <div class="down-content">
                            <a href="{{route('cars.show',$car)}}"><h3>{{$car->brand->name}}</h3></a>
                            <a href="{{route('cars.show',$car)}}"><h4>{{$car->name}}</h4></a>
                            <h6><small><del> $11199.00</del></small> $11179.00</h6>

                            <p>190 hp &nbsp;/&nbsp; {{$car->fuel_type}} &nbsp;/&nbsp; {{$car->manufactured}} &nbsp;/ new </p>

                            <small>
                                <strong title="Author"><i class="fa fa-dashboard"></i> {{$car->current_mileage}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                <strong title="Author"><i class="fa fa-cube"></i> {{$car->engine_capacity}}cc</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong title="Views"><i class="fa fa-cog"></i> {{$car->transmission}}</strong>
                            </small>
                        </div>
                    </div>

                </div>
                @endforeach



                </div>
            </div>
        </div>
    </div>
@endsection
