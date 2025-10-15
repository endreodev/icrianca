@extends('backend.layouts.default')


@section('content')
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="col-12">
                        @include('backend.layouts.alerts')
                    </div>
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="{{ route('frontend.home') }}">
                                            <img src="{{ asset('public') }}/backend/images/logo-full.png" alt="">
                                        </a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Recuperar Senha</h4>
                                    <form action="{{ route('backend.login.forgot.password.submit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group">
                                            <label class="text-white"><strong>Confirme seu E-mail</strong></label>
                                            <input type="email" id="email" class="form-control" name="email"
                                                required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="text-white"><strong>Nova senha</strong></label>
                                            <input type="password" id="password" class="form-control" name="password"
                                                required autofocus>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="text-white"><strong>Confirme nova senha</strong></label>
                                            <input type="password" id="password-confirm" class="form-control"
                                                name="password_confirmation" required autofocus>
                                            @if ($errors->has('password_confirmation'))
                                                <span
                                                    class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <a class="text-white" href="{{ route('backend.login.auth') }}">
                                                {{ __('texts.back') }}
                                            </a>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-white text-primary btn-block">ENVIAR</button>
                                        </div>
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
