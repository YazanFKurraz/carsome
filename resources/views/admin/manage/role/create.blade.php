@extends('admin.layouts.app')
@section('title')
    <title>Create New Role</title>
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
                        <li class="breadcrumb-item active">Create New Role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Create New Role</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.role.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-grupe">
                                    <label for="dispaly_name">Name (Display Name)</label>
                                    <input type="text" class="form-control" name="display_name">
                                </div>
                                @error('display_name')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-grupe">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                @error('name')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-grupe">
                                    <label for="discription">Discription</label>
                                    <input type="text" class="form-control" name="description">
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
                                                               name="permissionsSelected[]" value="{{$permission->id}}">
                                                        <em>{{($permission->display_name)}}</em>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary">Create role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
