@extends('layouts.auth')
@section('title', 'Verificar cuenta')
@section('styles')
    {{-- Customs css --}}
@endsection
@section('content')
<div class="col-md-7 col-lg-8">
    <div class="authincation-content">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="auth-form">
                    <div class="text-center mb-3">
                        <a href="{{ route('dashboard') }}" class="logo"><img src="{!! url('images/fcl-logo.png') !!}"
                                alt=""></a>
                    </div>
                    @if (session('resent'))
                        <div class="alert alert-secondary solid alert-dismissible fade show">
                            <strong>{{ __('verify.done') }}</strong> {{ __('verify.fresh_link') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="btn-close">
                            </button>
                        </div>
                    @endif
                    <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                        @csrf
                        <p class="text-center">
                            {{ __('verify.check_email') }}
                            <button type="submit" class="d-inline btn btn-link p-0">
                                {{ __('verify.click_here') }}
                            </button>
                        </p>
                    </form>
                    <div class="new-account mt-3 text-center">
                        <p>{{ __('login.dont_have_account') }} <a class="text-primary"
                                href="{{ route('signup') }}">{{ __('login.signup') }} </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    {{-- Customs js --}}
    {{-- <script src="{{url('js/viewlogic/login/index.js')}}"></script> --}}
@endsection
