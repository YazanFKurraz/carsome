@extends('admin.layouts.app')
@section('title')
    <title>Permission</title>
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
                        <li class="breadcrumb-item active"><a href="{{route('admin.permissions')}}">Manage
                                Permission</a></li>
                        <li class="breadcrumb-item active">Permission Details</li>
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
                    <h5>Permission Details</h5>
                </div>
                <div class="col-md-9 text-right">
                    <a href="{{route('admin.permission.edit', $permission->id)}}" class="btn btn-primary" style="margin-bottom: 10px">
                        <i class="fa fa-plus"></i>
                        Create New Permission
                    </a>
                </div>
            </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <label for="name">Name (DisPlay Name):</label>
                                <pre>{{$permission->display_name}}</pre>
                            </div>
                            <div class="col-md-4">
                                <label for="Slug">Slug:</label>
                                <pre>{{$permission->name}}</pre>
                            </div>
                            <div class="col-md-4">
                                <label for="description">Description:</label>
                                <pre>{{$permission->description}}</pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
