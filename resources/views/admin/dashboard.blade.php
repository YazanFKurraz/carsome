@extends('admin.layouts.app')
@section('title')
    <title>Dashboard home</title>
@endsection
@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                @if(auth()->user()->hasRole(['superadministrator', 'administrator']))
                                        {{\App\Models\Car::count()}}
                                    @elseif(auth()->user()->hasRole('dealer'))
                                        {{\App\Models\Car::where('user_id', auth()->user()->id)->count()}}
                                @endif
                            </h3>


                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('admin.cars')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{\App\User::count()}}</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('admin.users')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if(auth()->user()->hasRole(['superadministrator', 'administrator','dealer']))
                                    <a href="{{route('admin.cars')}}"><i class="fas fa-arrow-circle-right"></i></a>
                                @endif
                                    Cars
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Created by</th>
                                    <th style="width: 40px">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cars as $car )
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>
                                            @if(auth()->user()->hasRole(['superadministrator', 'administrator','dealer']))
                                            <a href="{{route('admin.car.show.details', $car->id)}}"
                                               style="color: black;" target="_blank">
                                                @endif
                                                <p>{{$car->name}}</p>
                                            </a>
                                        </td>
                                        <td>
                                            {{$car->user->name}}
                                        </td>
                                        <td>
                                            @if(auth()->user()->hasRole('checkup'))

                                                    @if($car->getIsCheckup() == 'is_checkup')
                                                            <button
                                                                class="btn btn-flat btn-primary btn-sm rounded-pill">{{$car->getIsCheckup()}} </button>
                                                        @else
                                                            <button
                                                                class="btn btn-flat bg-danger btn-xs rounded-pill">{{$car->getIsCheckup()}} </button>
                                                    @endif

                                                @elseif(auth()->user()->hasRole(['superadministrator', 'administrator','dealer']))
                                                    @if($car->getActive() == 'active')
                                                            <button
                                                                class="btn btn-flat btn-primary btn-sm rounded-pill">{{$car->getActive()}} </button>
                                                        @else
                                                            <button class="btn btn-flat bg-danger btn-xs rounded-pill">{{$car->getActive()}} </button>
                                                    @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-header -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                @if(auth()->user()->hasRole(['superadministrator', 'administrator']))
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="row">
                                @foreach($notifications as $notify)
                                    <div class="col-md-12 ">
                                        <a href="{{route('admin.car.edit', $notify->data['id'])}}" class="dropdown-item"
                                           target="_blank">
                                            <!-- Message Start -->
                                            <div class="media">
                                                <img src="{{asset('template/dist/img/user1-128x128.jpg')}}"
                                                     alt="User Avatar"
                                                     class="img-size-50 mr-3 img-circle">
                                                <div class="media-body">
                                                    <h3 class="dropdown-item-title">
                                                        {{$notify->data['user']}}
                                                        <span class="float-right text-sm text-danger"><i
                                                                class="fas fa-star"></i></span>
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
                @endif
            </div>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
@endsection

