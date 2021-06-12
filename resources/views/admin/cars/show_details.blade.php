@extends('admin.layouts.app')
@section('title')
    <title>Create details car</title>
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Car details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.cars')}}">Cars</a></li>
                        <li class="breadcrumb-item active">car details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Car Details</h5>
                </div>
                <div class="col-md-9 text-right">
                    <a href="{{route('admin.car.edit', $car->id)}}" class="btn btn-primary" style="margin-bottom: 10px">
                        <i class="fa fa-plus"></i>
                        Edit car
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <pre><label for="name">Name (car):</label> {{$car->name}}</pre>
                        </div>
                        <div class="col-md-4">
                           <pre> <label for="name">Name (Brand):</label> {{$car->brand->name}}</pre>
                        </div>
                        <div class="col-md-4">
                            <pre><label for="name">Fuel type:</label> {{$car->fuel_type}}</pre>
                        </div>
                        <div class="col-md-4">
                           <pre><label for="name">Current mileage:</label> {{$car->current_mileage}}</pre>
                        </div>
                        <div class="col-md-4">
                            <pre><label for="name">Engine capacity:</label> {{$car->engine_capacity}}</pre>
                        </div>
                        <div class="col-md-4">
                           <pre><label for="name">Transmission:</label> {{$car->transmission}}</pre>
                        </div>
                        <div class="col-md-4">
                          <pre><label for="name">Color:</label> {{$car->color}}</pre>
                        </div>
                        <div class="col-md-4">
                            <pre><label for="Slug">Manufactured:</label> {{$car->manufactured}}</pre>
                        </div>
                        <div class="col-md-4">
                           <pre> <label for="description">Registration Ttype:</label> {{$car->registration_type}}</pre>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <pre> <label for="description">Description:</label> {!! $car->description !!}</pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
