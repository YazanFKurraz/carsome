@extends('admin.layouts.app')
@section('title')
    <title>Checkup</title>
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
                        <li class="breadcrumb-item active"><a href="{{route('admin.checkups')}}">Checkups</a></li>
                        <li class="breadcrumb-item active">role Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row justify-content-center">
        @include('admin.layouts.includes.alerts.succsess')
        @include('admin.layouts.includes.alerts.erorrs')
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Checkup</h5>
                </div>
                <div class="col-md-9 text-right">
                    <a href="{{route('admin.checkup.edit', $checkup->id)}}" class="btn btn-primary"
                       style="margin-bottom: 10px">
                        <i class="fa fa-plus"></i>
                        Edit checkup
                    </a>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <pre><label for="name">External (rating 1_5):</label> {{$checkup ->external}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="name">External description:</label> {{$checkup ->external_description}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <pre><label for="name">Wheels (rating 1_5):  </label> {{$checkup ->wheels}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Wheels description:</label> {{$checkup ->wheels_description}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <pre><label for="name">Engine (rating 1_5):  </label> {{$checkup ->engine}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Engine description:</label> {{$checkup ->engine_description}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <pre><label for="name">Internal (rating 1_5):</label> {{$checkup ->internal}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Internal description:</label> {{$checkup ->internal_description}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/app.js')}}"></script>
    <script>

        var app = new Vue({
            el: '#app',
            data: {
                permission_type: 'basic',
                crudSelected: ['create', 'read', 'update', 'delete'],
                resource: ''
            },
        });

    </script>
@endsection
