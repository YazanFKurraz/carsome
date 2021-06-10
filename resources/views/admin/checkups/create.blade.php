@extends('admin.layouts.app')
@section('title')
    <title>Create checkup</title>
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0">Brands</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.checkups')}}">Checkups</a></li>
                        <li class="breadcrumb-item active">Create checkup</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Create checkup <i>{{$car->name}}</i></h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.checkup.store', $car->id)}}" method="POST">
                        @csrf

                        <input type="hidden" name="car_id" value="{{$car->id}}">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="examplebrand">External</label>
                                    <input type="text" class="form-control" name="external" id="examplebrand"
                                           placeholder="Enter number rating external">
                                    @error('external')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>external_description</label>
                                    <textarea class="form-control" rows="1" name="external_description" placeholder="Enter ..."></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="examplebrand">Wheels</label>
                                    <input type="text" class="form-control" name="wheels" id="examplebrand"
                                           placeholder="Enter number rating wheels">
                                    @error('wheels')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>wheels_description</label>
                                    <textarea class="form-control" rows="1" name="wheels_description" placeholder="Enter ..."></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="examplebrand">Engine</label>
                                    <input type="text" class="form-control" name="engine" id="examplebrand"
                                           placeholder="Enter number rating engine">
                                    @error('engine')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>engine_description</label>
                                    <textarea class="form-control" rows="1" name="engine_description" placeholder="Enter ..."></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="examplebrand">Internal</label>
                                    <input type="text" class="form-control" name="internal" id="examplebrand"
                                           placeholder="Enter number rating internal">
                                    @error('internal')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>internal_description</label>
                                    <textarea class="form-control" rows="1" name="internal_description" placeholder="Enter ..."></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_checkup" id="exampleCheck">
                                    <label class="form-check-label" for="exampleCheck">Is checkup</label>
                                </div>
                                @error('is_checkup')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_accident" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Is Accident</label>
                                </div>
                                @error('is_accident')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <br>
                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
