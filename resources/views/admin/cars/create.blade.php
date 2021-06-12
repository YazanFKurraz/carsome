@extends('admin.layouts.app')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection
@section('title')
    <title> Create Car</title>
@endsection
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Car</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.cars')}}">Cars</a></li>
                        <li class="breadcrumb-item active">create car</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Create New Car</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.car.store')}}" method="POST">
                            @csrf

                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="examplebrand">Name car</label>
                                    <input type="text" class="form-control" name="name" id="examplebrand"
                                           placeholder="Enter name car">
                                    @error('name')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group" >
                                    <label>Select Brand</label>
                                    <select name="brand_id" id="brand" class="form-control select2bs4 select2-hidden-accessible"
                                            style="width: 100%;" data-select2-id="17"
                                            tabindex="-1" aria-hidden="true">
                                        <option value=" " selected>please select brand</option>
                                        @if($brands && $brands -> count() > 0)
                                            @foreach($brands as $brand)
                                                <option value="{{$brand -> id }}">{{$brand -> name}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    @error('brand_id')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Select Model</label>

                                    <select class="form-control select2bs4 select2-hidden-accessible" name="model_id" id="model">
                                        <option value=" " selected>please select model</option>
                                    </select>
                                    @error('model_id')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                                @if(auth()->user()->hasRole(['superadministrator','administrator']))
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="is_active"
                                                   id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Active</label>
                                        </div>
                                        @error('is_active')
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                            <button class="btn btn-primary">Create car</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#brand').on('change', function (e) {
                var brand_id = e.target.value;
                $.ajax({
                    url: "{{ route('admin.car.model.ajax') }}",
                    type: "POST",
                    data: {
                        brand_id: brand_id
                    },
                    success: function (data) {
                        $('#model').empty();
                        $.each(data.models_car, function (index, model) {
                            $('#model').append('<option value="' + model.id + '">' + model.name + '</option>');
                        })
                    }
                })
            });
        });
    </script>
@endsection
