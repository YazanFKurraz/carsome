@extends('admin.layouts.app')
@section('title')
    <title>Permissions</title>
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
                        <li class="breadcrumb-item active">Manage Permissions</li>
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
                    <h5>Manage Permissions</h5>
                </div>
                <div class="col-md-9 text-right">
                    <a href="{{route('admin.permission.create')}}" class="btn btn-primary" style="margin-bottom: 10px">
                        <i class="fa fa-plus"></i>
                        Create New Permission
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>##</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @isset($permissions)
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$permission->display_name}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->description}}</td>

                                    <td>
                                        <a class="btn btn-secondary btn-sm"
                                           href="{{route('admin.permission.show', $permission->id)}}">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm"
                                           href="{{route('admin.permission.edit', $permission->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                           href="{{route('admin.permission.delete', $permission->id)}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        @endisset
                        </tbody>
                    </table>
                    <div class="row justify-content-center">
                        {{$permissions->render()}}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
