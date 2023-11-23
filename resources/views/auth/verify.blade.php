@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header text-dark font-weight-bold text-2xl ">{{ __('Verify Your Email Address') }}</div>
                <div class="card-body">

                    <img src="{{ asset('assets/img/Mail sent-rafiki.svg') }}" alt="" style="display: block; width: 250px; margin: auto;">
                    <h3 class="text-center text-dark font-weight-bold">{{ __('We have sent a verification link to your email. ') }}</h4>
                    <br>
                    <h5 class="text-dark font-weight-bold">
                        {{ __('Please verify your email to continue. ') }}
                    </h5>
                    <h6 class="text-dark font-weight-bold">
                    {{ __('If you did not receive the email') }}
                    </h6>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-dark">{{ __('click here to request another') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
