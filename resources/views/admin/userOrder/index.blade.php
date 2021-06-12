@extends('admin.layouts.app')
@section('title')
    <title>User Order</title>
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
                        <li class="breadcrumb-item active">User Order</li>
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
                    <h5>User Order View</h5>
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
                            <th>Model</th>
                            <th>Phone</th>
                            <th>Transaction</th>
                        </tr>
                        </thead>
                        <tbody>

                        @isset($userOrders)
                            @foreach($userOrders as $userOrder)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$userOrder->name}}</td>
                                    <td>
                                        {{$userOrder->brand->name}}
                                    </td>
                                    <td>
                                        {{$userOrder->model->name}}
                                    </td>
                                    <td>
                                        {{$userOrder->phone}}
                                    </td>

                                    <td>

                                        <a class="btn btn-warning btn-sm" href="{{route('admin.car.create')}}">
                                            <i class="fa fa-edit"></i>Add Car
                                        </a>

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
                    {{$userOrders->render()}}
                </div>
            </div>

        </div>
    </div>
@endsection
