@extends('front.layouts.app')

@section('content')

    <!-- Page Content -->


    <div class="best-features about-features">
        <div class="container">
            <div class="row">

                <div class="col-md-12 m-auto text-center">
                    <div class="left-content">
                        <h2 class="my-5">Welcome !!!</h2>
                        <p class="" style="font-size:30px; line-height:50px ">We're excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger align-baseline">{{ __('click here to request another') }}</button>
                            </form>
                </div>
            </div>
        </div>
    </div>











@endsection
