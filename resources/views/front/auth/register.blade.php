@extends('front.layouts.app')
@section('content')


    <div class="mt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <form action="{{route('register')}}" method="post" class="m-auto text-center ">
                        @csrf
                        <div class="shadow-lg col-md-6 m-auto p-5">
                            <div>
                                <h2 class="mt-3 mb-5">Resigter Page</h2>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="my-3">
                                <label for="name" class="d-block py-2">Full Name</label>
                                <input type="name" name="name" class="form-control col-md-8 m-auto">
                            </div>
                            <div class="my-3">
                                <label for="email" class="d-block py-2">Email</label>
                                <input type="email" name="email" class="form-control col-md-8 m-auto">
                            </div>
                            <div class="my-3">
                                <label for="password" class="d-block py-2 ">Password</label>
                                <input type="password" name="password" class="form-control col-md-8 m-auto">
                            </div>
                            <div class="my-3">
                                <label for="password_confirmation" class="d-block py-2 ">Confirm Password</label>
                                <input type="password" name="password_confirmation"
                                       class="form-control col-md-8 m-auto">
                            </div>
                            <div class="my-3">
                                <label for="address" class="d-block py-2">Address</label>
                                <input type="address" name="address" class="form-control col-md-8 m-auto">
                            </div>

                            <div class="my-3 ">
                                <label for="gender" class="d-block py-2">gender</label>
                                <input type="radio" name="gender" value="m" class=" "> Male
                                <input type="radio" name="gender" value="f" class=" "> Female
                            </div>

                            <div class="my-3">
                                <label for="phone" class="d-block py-2">Phone</label>
                                <input type="phone" name="phone" class="form-control col-md-8 m-auto">
                            </div>

{{--                            <div class="my-3">--}}
{{--                                <label for="role" class="d-block py-2">Role</label>--}}

{{--                                <select name="role" class="form-control col-md-8 m-auto">--}}
{{--                                    <option value="" selected disabled> choose your role</option>--}}
{{--                                    <option value="user">user</option>--}}
{{--                                    <option value="dealer">dealer</option>--}}
{{--                                    <option name="checkup">checkup</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="mt-5">
                                <button class="btn btn-danger col-4">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@stop
