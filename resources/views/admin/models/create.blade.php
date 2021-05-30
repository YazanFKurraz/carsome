@extends('admin.layouts.app')
@section('title')
    {{'Create model car'}}
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Model Car</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.models')}}">Models</a></li>
                        <li class="breadcrumb-item active">Create model</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">


                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Model Car</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.model.store')}}" method="POST">
                            @csrf
                             <div class="card-body">
                                <div class="form-group">
                                    <label for="examplebrand">Create Model Car</label>
                                    <input type="text" class="form-control" name="name" id="examplebrand"
                                           placeholder="Enter model">
                                    @error('name')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_active" id="exampleCheck1" checked>
                                    <label class="form-check-label" for="exampleCheck1">Active</label>
                                </div>
                                    @error('is_active')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Select Brand</label>
                                    <select name="brand_id" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17"
                                            tabindex="-1" aria-hidden="true" >
                                        <option>please select brand</option>
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

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
