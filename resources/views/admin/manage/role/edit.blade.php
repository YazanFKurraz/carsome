@extends('admin.layouts.app')
@section('title')
    <title>Edit Role</title>
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
                        <li class="breadcrumb-item"><a href="{{route('admin.roles')}}">Manage Roles</a></li>
                        <li class="breadcrumb-item active">Edit Role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Edit Role</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.role.update', $role->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <lable for="display_name">Name (Display Name)</lable>
                                    <input type="text" name="display_name" class="form-control"
                                           value="{{$role->display_name}}">
                                    @error('display_name')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <lable for="name">Slug</lable>
                                    <input type="name" name="name" class="form-control"
                                           value="{{$role->name}}">
                                    @error('name')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <lable for="password">Description</lable>
                                    <input type="text" name="description" class="form-control"
                                           value="{{$role->description}}">
                                </div>
                                @error('description')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h2>Permissions:</h2>
                                <div class="form-check">
                                    <div class="row">
                                        @foreach($permissions as $permission)
                                            <div class="col-md-3">
                                                <label for="form-check-label">
                                                    <input type="checkbox" class="form-checkbox-input"
                                                           name="permissionsSelected[]" value="{{$permission->id}}"
                                                           @if($role->permissions->contains($permission)) checked @endif>
                                                    <em>{{($permission->display_name)}}</em>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
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
