@extends('front.layouts.app')
@section('content')


<div class="mt-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <form action="{{route('login')}}" method="post" class="m-auto text-center ">
                    @csrf
<div class="shadow-lg col-md-6 m-auto p-5" >
    <div>
        <h2 class="mt-3 mb-5">Login Page</h2>
    </div>
                    <div class="my-3">
                        <label for="email" class="d-block py-2">Email</label>
                        <input type="email" name="email" class="form-control col-md-8 m-auto">
                    </div>
                    <div class="my-3">
                        <label for="email" class="d-block py-2 ">Password</label>
                        <input type="password" name="password" class="form-control col-md-8 m-auto">
                    </div>
                    <div class="my-3">
                        <input type="checkbox" class="  m-auto"> Remember me
                    </div>
                    <div class="mt-5">
                        <button class="btn btn-danger col-4">
                            login
                        </button>
                    </div>
</div>
                </form>
            </div>
        </div>
    </div>

</div>
@stop
