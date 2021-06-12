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
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Messege</th>
                        </tr>
                        </thead>
                        <tbody>

                        @isset($users)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->subject}}
                                    </td>
                                    <td>
                                        {{$user->message}}
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
                    {{$users->render()}}
                </div>
            </div>

        </div>
    </div>
@endsection
