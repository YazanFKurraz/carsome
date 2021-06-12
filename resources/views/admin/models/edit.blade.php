@extends('admin.layouts.app')
@section('title')
    {{'Edit model car'}}
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
                        <li class="breadcrumb-item active">Edit Model</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Edit model car</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.model.update', $model_car->id)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="examplebrand">Edit Model Car</label>
                                <input type="text" class="form-control" name="name" id="examplebrand"
                                       placeholder="Enter model" value="{{$model_car->name}}">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="{{$model_car->is_active}}"
                                           name="is_active" id="exampleCheck1" checked>
                                    <label class="form-check-label" for="exampleCheck1">Active</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Select Brand</label>
                                <select name="brand_id" class="form-control select2bs4 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                    <optgroup label="please select brand">
                                        @if($brands && $brands -> count() > 0)
                                            @foreach($brands as $brand)
                                                <option
                                                    {{$model_car->brand()->pluck('id')->contains($brand->id) ? 'selected' : ' '}}
                                                    value="{{$brand->id}}">{{ $brand->name}}
                                                </option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
