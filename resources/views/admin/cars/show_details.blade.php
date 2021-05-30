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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        @php
                            $count = 1
                        @endphp
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2"
                                       class="table table-bordered table-hover">
                                    <thead>
                                    </thead>
                                    <tbody>

                                    @isset($car)
                                            <tr>
                                                <td> <b>Name: </b>{{$car->name}}</td>
                                                <td> <b>Brand: </b>{{$car->brand->name}}</td>
                                            </tr>
                                            <tr>
                                                <td> <b>Fuel Type: </b>{{$car->fuel_type}}</td>
                                                <td> <b>Seat: </b>{{$car->seat}}</td>
                                            </tr>
                                            <tr>
                                                <td> <b>Current Mileage: </b>{{$car->current_mileage}}</td>
                                                <td> <b>Engine Capacity: </b>{{$car->engine_capacity}}</td>
                                            </tr>
                                            <tr>
                                                <td> <b>Transmission: </b>{{$car->Transmission}}</td>
                                                <td> <b>Color: </b>{{$car->color}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Manufactured: </b>{{$car->manufactured}}</td>
                                                <td> <b>Registration Type: </b>{{$car->registration_type}}</td>
                                            </tr>

                                    @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
    </section>
@endsection
