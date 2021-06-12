@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brand</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.brands')}}">Brands</a></li>
                        <li class="breadcrumb-item active">Edit brand</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Edit Brand</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- /.card-header -->
                    <!-- form start -->
                        <form action="{{route('admin.brand.update', $brand->id)}}" method="POST">
                            @csrf
                             <div class="card-body">
                                <div class="form-group">
                                    <label for="examplebrand">Edit brand</label>
                                    <input type="text" class="form-control" name="name"  value="{{$brand->name}}" id="examplebrand"
                                           placeholder="Enter brand">
                                </div>
                                <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_active" value="{{$brand->is_active}}"
                                           id="exampleCheck1" checked>
                                    <label class="form-check-label" for="exampleCheck1">Active</label>
                                </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                                <button class="btn btn-primary">Save change</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
