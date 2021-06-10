@extends('admin.layouts.app')
@section('title')
    <title>Notifications</title>
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
                        <li class="breadcrumb-item active">Notifications</li>
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
                    <h5>All Notification</h5>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <div> All Notification</div>
                    <div class="row">
                        @foreach($notifications as $notify)
                        <div class="col-md-12 ">
                                <a href="{{route('admin.car.edit', $notify->data['id'])}}" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="{{asset('template/dist/img/user1-128x128.jpg')}}" alt="User Avatar"
                                             class="img-size-50 mr-3 img-circle">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                {{$notify->data['user']}}
                                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm"> {{$notify->data['title']}}{{$notify->data['user']}}  </p>
                                            <p class="text-sm text-muted"><i
                                                    class="far fa-clock mr-1"></i> {{$notify->created_at}}</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>



    </script>

@endsection
