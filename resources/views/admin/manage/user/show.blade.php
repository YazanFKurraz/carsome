@extends('admin.layouts.app')
@section('title')
    <title>Users</title>
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
                        <li class="breadcrumb-item active"><a href="{{route('admin.users')}}">Manage Users</a></li>
                        <li class="breadcrumb-item active">User Details</li>
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
                    <h5>User Details</h5>
                </div>
                <div class="col-md-9 text-right">
                    <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary"
                       style="margin-bottom: 10px">
                        <i class="fa fa-plus"></i>
                        Edit user
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <pre>{{$user->name}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <pre>{{$user->email}}</pre>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="roles">Roles:</label>
                            @if($user->roles->count() > 0)
                                <div class="row">
                                    @foreach($user->roles as $role)
                                        <ul>
                                            <li>{{$role->display_name}}</li>
                                        </ul>
                                    @endforeach
                                </div>
                            @else
                                <p>This user has not been assigned to any roles yet</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
