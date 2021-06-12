@extends('admin.layouts.app')
@section('title')
    <title>Models Car</title>
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
                        <li class="breadcrumb-item active">Models</li>
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
                    <h5>Model View</h5>
                </div>
                <div class="col-md-9 text-right">
                    <a href="{{route('admin.model.create')}}" class="btn btn-primary" style="margin-bottom: 10px">
                        <i class="fa fa-plus"></i>
                        Create New Model
                    </a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>##</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Status</th>
                            <th>Transation</th>
                        </tr>
                        </thead>
                        <tbody>

                        @isset($models_car)
                            @foreach($models_car as $model_car)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$model_car->name}}</td>
                                    <td>{{$model_car->brand->name}}</td>
                                    <td>
                                        @if($model_car->getActive() == 'active')
                                            <i class="fa fa-check-circle" style="color:green"></i>
                                        @else
                                            <i class="fa fa-window-close" style="color:red"></i>
                                        @endif
                                    </td>
                                    <td>

                                        <a class="btn btn-warning btn-sm"
                                           href="{{route('admin.model.edit', $model_car->id)}}">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        @if(auth()->user()->hasRole(['superadministrator','administrator']))
                                            <a class="btn btn-danger btn-sm"
                                               href="{{route('admin.model.delete', $model_car->id)}}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @else

                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        @endisset
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-10 ">
                    {{$models_car->render()}}
                </div>
            </div>

        </div>
    </div>

@endsection
