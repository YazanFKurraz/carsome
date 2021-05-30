@extends('admin.layouts.app')
@section('title')
    <title>Brands</title>
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
                        <li class="breadcrumb-item active">Brands</li>
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
                    <h5>Brand View</h5>
                </div>
                <div class="col-md-9 text-right">
                    <a  href="{{route('admin.brand.create')}}" class="btn btn-primary" style="margin-bottom: 10px">
                        <i class="fa fa-plus"></i>
                        Create New Brand
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
                            <th>Status</th>
                            <th>Transation</th>
                        </tr>
                        </thead>
                        <tbody>

                        @isset($brands)
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>
                                        @if($brand->getActive() == 'active')
                                            <button class="btn btn-primary btn-sm rounded-pill" >{{$brand->getActive()}} </button>
                                        @else
                                            <button class="btn btn-danger btn-sm rounded-pill" >{{$brand->getActive()}} </button>
                                        @endif
                                    </td>

                                    <td>

                                        <a class="btn btn-warning btn-sm" href="{{route('admin.brand.edit', $brand->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if(auth()->user()->hasRole(['superadministrator','administrator']))
                                            <a class="btn btn-danger btn-sm" href="{{route('admin.brand.delete', $brand->id)}}">
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
                    {{$brands->render()}}
                </div>
            </div>

        </div>
    </div>
@endsection
