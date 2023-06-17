@extends('layouts.auth')
@section('title', 'Login')
@section('styles')
    {{-- Customs css --}}
@endsection
@section('content')
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <a href="{{ route('dashboard') }}"><img src="images/logo-icm.svg" alt=""></a>
                        </div>
                        <h4 class="text-center mb-4">Inicia sesión en tu cuenta</h4>
                        @include('layouts.partials.messages')
                        <form action="{{ route('auth') }}" method="POST" id="form-auth">
                            @csrf
                            <input type="hidden" name="token" id="token">
                            <div class="mb-3">
                                <label class="mb-1"><strong>Correo electrónico</strong></label>
                                <input type="text" name="email" class="form-control" placeholder="hola@ejemplo.com">
                                @if ($errors->has('email'))
                                    <div id="emailFeedback" class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="mb-1"><strong>Contraseña</strong></label>
                                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                @if ($errors->has('password'))
                                    <div id="passFeedback" class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row d-flex justify-content-between mt-4 mb-2">
                                <div class="mb-3">
                                    <div class="form-check custom-checkbox ms-1">
                                        <input type="checkbox" name="remember_token" class="form-check-input"
                                            id="basic_checkbox_1">
                                        <label class="form-check-label" for="basic_checkbox_1">Recordar mis datos</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <a href="page-forgot-password.html">He olvidado mi contraseña</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>¿No tienes una cuenta? <a class="text-primary" href="{{route('signup')}}">Registrate aquí</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- Customs js --}}
    <script src="{{url('js/viewlogic/login/index.js')}}"></script>
    {{-- Recaptcha --}}
    <script src="https://www.google.com/recaptcha/api.js?render=6LcIi3AaAAAAAG_D_CHeWwMdSbBpLm6kQl_vIGbG"></script>
@endsection
