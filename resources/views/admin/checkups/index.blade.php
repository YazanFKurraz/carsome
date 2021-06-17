@extends('admin.layouts.app')
@section('title')
    <title>Checkups</title>
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
                        <li class="breadcrumb-item active">Checkups</li>
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
                    <h5>Checkups View</h5>
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
                            <th>price</th>
                            <th>Create checkup</th>
                            <th>checkup</th>
                            <th>Transation</th>
                            <th>Image Checkups</th>
                        </tr>
                        </thead>
                        <tbody>

                        @isset($cars)
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>
                                        @if(strlen($car->name) > 20)
                                            {{substr("$car->name",'0','20') .'....' }}
                                        @else
                                            {{$car->name}}
                                        @endif
                                    </td>
                                    <td>{{$car->price}}</td>
                                    <td>
                                        @if(@$car->checkup->created_at)
                                            <b>{{$car->checkup->created_at}}</b>
                                        @else
                                            <i><sub>{{'Dont data checkup'}}</sub></i>
                                        @endif</td>

                                    <td>
                                        @if($car->getIsCheckup() == 'checkup')
                                            <i class="fa fa-check-circle" style="color:green"></i>
                                        @else
                                            <i class="fa fa-window-close" style="color:red"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{route('admin.checkup.edit', @$car->checkup->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-outline-dark btn-sm"
                                           href="{{route('admin.checkup.show', @$car->checkup->id)}}">
                                            <i class="fa fa-info"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn bg-primary btn-sm"
                                           href="{{route('admin.checkup.create', $car->id)}}">
                                            Add Checkup
                                        </a>
                                        @if(@$car->checkup)
                                            <a class="btn btn-outline-info btn-sm"
                                               href="{{route('admin.checkup.dropzone', @$car->checkup->id)}}">
                                                Add Images </a>
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
                    {{$cars->render()}}
                </div>
            </div>

        </div>
    </div>
@endsection
