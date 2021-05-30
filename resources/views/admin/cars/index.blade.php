@extends('admin.layouts.app')
@section('title')
    <title>Car</title>
@endsection
@section('style')
{{--    <style>--}}
{{--        .btn {--}}
{{--            width: 50px;--}}
{{--            height: 40px;--}}
{{--        }--}}
{{--    </style>--}}
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Car</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Car</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @include('admin.layouts.includes.alerts.succsess')
    @include('admin.layouts.includes.alerts.erorrs')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Car View</h3>
                            <a class="btn btn-flat bg-gradient-success btn-sm float-right" href="{{route('admin.car.create')}}">
                                <i class="far fa-plus-square"></i>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                @php
                                    $count = 1
                                @endphp
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2"
                                               class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                                               aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th>##</th>
                                                <th>Name</th>
                                                <th>Brand</th>
                                                <th>model</th>
                                                <th>Status</th>
                                                <th>Details</th>
                                                <th>Transation</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $count = 1
                                            @endphp
                                            @isset($cars)
                                                @foreach($cars as $car)
                                                    <tr>
                                                        <td>{{$count++}}</td>
                                                        <td>{{$car->name}}</td>
                                                        <td>{{$car->brand->name}}</td>
                                                        <td>{{$car->model->name}}</td>
                                                        <td>
                                                            @if($car->getActive() == 'active')
                                                                <button class="btn btn-flat btn-primary btn-sm rounded-pill" >{{$car->getActive()}} </button>
                                                            @else
                                                                <button class="btn btn-flat bg-danger btn-xs rounded-pill" >{{$car->getActive()}} </button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-outline-info btn-sm" href="{{route('admin.car.create.details', $car->id)}}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-outline-primary btn-sm" href="{{route('admin.car.show.details', $car->id)}}">
                                                                <i class="fa fa-info"></i>
                                                            </a>
                                                            </td>
                                                        <td>
                                                            <a class="btn btn-warning btn-sm" href="{{route('admin.car.edit', $car->id)}}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-danger btn-sm" href="{{route('admin.car.delete', $car->id)}}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            <a class="btn btn-flat bg-danger btn-sm" href="{{route('admin.car.dropzone', $car->id)}}">
                                                              Add Images
                                                            </a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        {{$cars->render()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
