@extends('admin.layouts.app')
@section('title')
    <title>Edit Permission</title>
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
                        <li class="breadcrumb-item"><a href="{{route('admin.permissions')}}">Manage Permissions</a></li>
                        <li class="breadcrumb-item active">Edit Permission</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Edit Permission</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.permission.update', $permission->id)}}" method="POST">
                        @csrf

                        <input type="hidden" name="permission_type" value="basic_edit">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <lable for="display_name">Name (Display Name)</lable>
                                    <input type="text" name="display_name" class="form-control"
                                           value="{{$permission->display_name}}">
                                    @error('display_name')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <lable for="name">Slug</lable>
                                    <input type="name" name="name" class="form-control"
                                           value="{{$permission->name}}" disabled>
                                    @error('name')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <lable for="password">Description</lable>
                                    <input type="text" name="description" class="form-control"
                                           value="{{$permission->description}}">
                                </div>
                                @error('description')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">Save change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
