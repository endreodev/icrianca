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
                                    <h4 class="text-center mb-4 text-white">
                                        {{ __('texts.sign_in_your_account') }}
                                    </h4>
                                    <form action="{{ route('backend.login.auth') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1 text-white">
                                                <strong>{{ __('attributes.email') }}
                                                </strong>
                                            </label>
                                            <input type="email" class="form-control" name="email" value="">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white">
                                                <strong>
                                                    {{ __('attributes.password') }}
                                                </strong>
                                            </label>
                                            <input type="password" class="form-control" name="password" value="">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ml-1 text-white">
                                                    <input type="checkbox" name="remember" class="custom-control-input"
                                                        id="basic_checkbox_1">
                                                    <label class="custom-control-label" for="basic_checkbox_1">
                                                        {{ __('texts.remember_account') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a class="text-white" href="{{ route('backend.login.forgot') }}">
                                                    {{ __('texts.forgot_password') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">
                                                {{ __('texts.sign_in') }}
                                            </button>
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
