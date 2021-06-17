@extends('admin.layouts.app')
@section('title')
    <title>Create details car</title>
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
                        <li class="breadcrumb-item"><a href="{{route('admin.cars')}}">Cars</a></li>
                        <li class="breadcrumb-item active">Create car details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            @error('car_id')
            <div class="row mr-2 ml-2">
                <button type="text" class="btn btn-block btn-outline-danger mb-2"
                        id="type-error">
                    {{$message}}
                </button>
            </div>
            @enderror
            <div class="row">
                <div class="col-md-3">
                    <h5>Create Details Car</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <form action="{{route('admin.car.store.details', $car->id)}}" method="POST">
                        @csrf

                        <input type="hidden" value="{{$car->id}}" name="car_id">

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-5">
                                    <label for="exampleSelectBorderWidth2">Type</label>
                                    <select class="custom-select form-control-border border-width-2"
                                            id="exampleSelectBorderWidth2"
                                            name="is_status">
                                        <option>select type</option>
                                        <option value="0">User car</option>
                                        <option value="1">New csr</option>
                                    </select>
                                    @error('is_status')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-5">
                                    <label for="examplebrand">Create manufactured</label>
                                    <input type="text" class="form-control " name="manufactured" id="examplebrand"
                                           placeholder="Enter manufactured">
                                    @error('manufactured')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-5">
                                    <label for="examplebrand">Registration Type</label>
                                    <input type="text" class="form-control" name="registration_type" id="examplebrand"
                                           placeholder="Enter registration type">
                                    @error('registration_type')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-5">
                                    <label for="examplebrand">Engine Capacity</label>
                                    <input type="text" class="form-control" name="engine_capacity" id="examplebrand"
                                           placeholder="Enter model engine_ apacity">
                                    @error('engine_capacity')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-5">
                                    <label for="examplebrand">Power Horse</label>
                                    <input type="text" class="form-control" name="power_horse" id="examplebrand"
                                           placeholder="Enter Current Mileage">
                                    @error('power_horse')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-5">
                                    <label for="examplebrand">Current Mileage</label>
                                    <input type="text" class="form-control" name="current_mileage" id="examplebrand"
                                           placeholder="Enter Current Mileage">
                                    @error('current_mileage')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-5">
                                    <label for="examplebrand">Seat</label>
                                    <input type="text" class="form-control" name="seat" id="examplebrand"
                                           placeholder="Enter seat">
                                    @error('seat')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-5">
                                    <label for="exampleSelectBorderWidth2">Doors</label>
                                    <input type="number" class="form-control" name="doors" id="examplebrand"
                                           placeholder="Enter number doors">
                                    @error('doors')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-5">
                                    <label for="examplebrand">Color</label>
                                    <input type="text" class="form-control" name="color" id="examplebrand"
                                           placeholder="Enter color">
                                    @error('color')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>


                                <div class="form-group col-5">
                                    <label for="exampleSelectBorderWidth2">Fuel Type</label>
                                    <select class="custom-select form-control-border border-width-2"
                                            id="exampleSelectBorderWidth2"
                                            name="fuel_type">
                                        <option>select fuel type</option>
                                        <option value="Soler">Soler</option>
                                        <option value="petrol">petrol</option>
                                    </select>
                                    @error('fuel_type')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-5">
                                    <label for="exampleSelectBorderWidth2">Transmission</label>
                                    <select class="custom-select form-control-border border-width-2"
                                            id="exampleSelectBorderWidth2"
                                            name="transmission">
                                        <option>select transmission type</option>
                                        <option value="manual">manual</option>
                                        <option value="automatic">automatic</option>
                                    </select>
                                    @error('transmission')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                        </div>
                        <textarea class="form-control" id="editor" name="description"></textarea>
                        <br>
                        <button class="btn btn-primary">Create details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
