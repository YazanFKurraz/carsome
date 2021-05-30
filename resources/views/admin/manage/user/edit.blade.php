@extends('admin.layouts.app')
@section('title')
    <title>Edit User</title>
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
                        <li class="breadcrumb-item"><a href="{{route('admin.users')}}">Manage Users</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Edit User</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.user.update', $user->id)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <lable for="name">Name</lable>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                    @error('name')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <lable for="email">Email</lable>
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                    @error('email')
                                        <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <lable for="password">Password</lable>
                                    <input type="password" name="password" class="form-control"
                                           placeholder="Manually type password" id="password" style="display:none">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="donotchange" id="donotchange"
                                           class="form-check-input" checked onclick="myFunction()">
                                    <lable for="auto_generate" class="form-check-label"> Do not change</lable>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="roles">Roles:</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            @foreach($roles as $role)
                                                <p>
                                                    <label for="" class="form-check-label">
                                                        <input type="checkbox" name="roles[]" id=""
                                                               class="form-check-input"
                                                               value="{{$role->id}}" @if($user->roles->contains($role)) checked @endif}}>
                                                        <em>({{$role->display_name }})</em>
                                                    </label>
                                                </p>
                                            @endforeach
                                        </div>
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

@section('script')
    <script>
        function myFunction() {
            var checkBox = document.getElementById("donotchange");
            var text = document.getElementById("password");
            if (checkBox.checked == true) {
                text.style.display = "none";
            } else {
                text.style.display = "block";
            }
        }
    </script>
@endsection
