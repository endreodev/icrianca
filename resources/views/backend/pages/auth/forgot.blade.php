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
                                    <form action="{{ route('backend.login.forgot.request') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="text-white"><strong>E-mail</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="hello@example.com" required>
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
