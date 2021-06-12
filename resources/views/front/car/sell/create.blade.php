@extends('front.layouts.app')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection
@section('content')

    <!-- Page Content -->


    <div class="find-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="section-heading">
                        <h2> add yours cars</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="container">
                        <div class="row justify-content-center ">
                            <div class="col-md-10 ">
                                <div class="row">
                                    <div class="col-md-3">

                                    </div>
                                </div>
                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        @if(Session::has('success'))
                                            <div class="alert alert-success" role="alert">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif
                                        <form action="{{route('cars.store')}}" method="POST">
                                            @csrf

                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="examplebrand">Name Car</label>
                                                    <input type="text" class="form-control" name="name" id="examplebrand"
                                                           placeholder="ex:skoda fabia 2020 ">
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
                                                <div class="form-group">
                                                    <label for="examplebrand">Mobile No.</label>
                                                    <input type="text" class="form-control" name="phone" id="examplebrand"
                                                           placeholder="EX: 059-xxx-xxxx ">
                                                    @error('phone')
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>



                                            </div>
                                                <!-- /.card-body -->
                                                <button class="btn btn-primary">Sent</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    url: "{{ route('model.ajax') }}",
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
