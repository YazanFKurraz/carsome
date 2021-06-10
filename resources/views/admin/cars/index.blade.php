@extends('admin.layouts.app')
@section('title')
    <title>Car</title>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
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
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Cars</h5>
                </div>
                <div class="col-md-9 text-right">
                    <a href="{{route('admin.car.create')}}" class="btn btn-primary" style="margin-bottom: 10px">
                        <i class="fa fa-plus"></i>
                        Create New Car
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>##</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Create_by</th>
                            <th>Status</th>
                            <th>Details</th>
                            <th>Transation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($cars)
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$car->name}}</td>
                                    <td>{{$car->brand->name}}</td>
                                    <td>{{$car->model->name}}</td>
                                    <td>{{$car->user->name}}</td>
                                    <td>
                                        @if($car->getActive() == 'active')
                                            <button
                                                class="btn btn-flat btn-primary btn-sm rounded-pill">{{$car->getActive()}} </button>
                                        @else
                                            <button
                                                class="btn btn-flat bg-danger btn-xs rounded-pill">{{$car->getActive()}} </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-info btn-sm"
                                           href="{{route('admin.car.create.details', $car->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-outline-secondary btn-sm"
                                           href="{{route('admin.car.show.details', $car->id)}}">
                                            <i class="fa fa-info"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{route('admin.car.edit', $car->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if(auth()->user()->hasRole(['superadministrator', 'administrator']))
                                            <a class="btn btn-danger btn-sm"
                                               href="{{route('admin.car.delete', $car->id)}}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                        <a class="btn bg-info btn-sm"
                                           href="{{route('admin.car.dropzone', $car->id)}}">
                                            Add Images
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                        </tbody>
                    </table>
                    <div class="row justify-content-center">
                        {{$cars->render()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.card-body -->
@endsection
