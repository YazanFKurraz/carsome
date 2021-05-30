@extends('admin.layouts.app')
@section('title')
    <title>Create details car</title>
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Car details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.cars')}}">Cars</a></li>
                        <li class="breadcrumb-item active">car details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @include('admin.layouts.includes.alerts.succsess')
    @include('admin.layouts.includes.alerts.erorrs')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        @php
                            $count = 1
                        @endphp
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        {{$car->name}}

                                        <hr>
                                        @if($car->images->count() > 0)
                                            <div class="row">
                                                @foreach($car->images as $image)
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <a href="{{asset($image->path)}}" data-lity>
                                                                <img
                                                                    src="{{asset($image->path)}}"
                                                                    height="200px" width="200px"
                                                                    class="card-img-top mb-3" alt="No Image">
                                                            </a>
                                                            <div class="card-body"></div>
                                                            <div class="card-footer">
                                                                <form
                                                                    action="{{route('admin.car.dropzone.delete', ['image' => $image ])}}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" id="deleteRecord"
                                                                            class="btn btn-danger">
                                                                        Delete
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            </div>

                                        @else
                                            <p>No images for this car</p>
                                        @endif
                                        <hr>

                                        <div class="row justify-content-center">
                                            <div class="col-md-10">
                                                <form action="{{route('admin.car.dropzone.upload', ['car' => $car])}}"
                                                      method="POST"
                                                      class="dropzone"
                                                      id="myDrpozone"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('script')
    <script>
        Dropzone.options.myDrpozone = {
            acceptedFiles: 'image/*',
            init: function () {
                this.on('success', function () {
                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                        console.log("finished")
                        location.reload()
                    }
                })
            }
        }
    </script>
@endsection
