@extends('frontend.layouts.app')



@section('content')
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content">

        </div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->


    <!--Page Header Start-->
    <section class="page-header clearfix"
        style="background-image: url('{{ $boot_definitions->getImage('originals', 'bg_contacts') }}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>Contato</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="active">Contato</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Start Contact Details One-->
    <section class="contact-details-one">
        <div class="container">
            <div class="row">
                <!--Start Single Contact Details One-->
                <div class="col-xl-6 col-lg-6">
                    <div class="contact-details-one__single">
                        <div class="contact-details-one__single-icon">
                            <span class="icon-phone-call"></span>
                        </div>
                        <div class="contact-details-one__single-text">
                            <h4><a href="tel:{!! $boot_definitions->phone !!}">{!! $boot_definitions->phone !!}</a></h4>
                            <p>Ligue para a gente</p>
                        </div>
                    </div>
                </div>
                <!--End Single Contact Details One-->

                <!--Start Single Contact Details One-->
                <div class="col-xl-6 col-lg-6">
                    <div class="contact-details-one__single">
                        <div class="contact-details-one__single-icon">
                            <span class="icon-message-1"></span>
                        </div>
                        <div class="contact-details-one__single-text">
                            <h4><a href="mailto:{!! $boot_definitions->email_site !!}">{!! $boot_definitions->email_site !!}</a></h4>
                            <p>Nos envie um e-mail</p>
                        </div>
                    </div>
                </div>
                <!--End Single Contact Details One-->

            </div>
        </div>
    </section>
    <!--End Contact Details One-->

    <!--Contact Page Start-->
    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="contact-page__left">
                        <div class="section-title">
                            <span class="section-title__tagline">Nos envie uma mensagem</span>
                            <h2 class="section-title__title">Entre em Contato</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <style>
                        .form-control-recptcha input[name=attention] {
                            opacity: 0;
                            height: 1px;
                            line-height: 0px;
                        }
                    </style>
                    <div class="contact-page__right">
                        <form action="{{ route('frontend.forms.send', 'contact') }}"
                            class="comment-one__form form-control-recptcha" method="POST" autocomplete="off">
                            @csrf
                            {!! RecaptchaV3::field('register') !!}
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Seu Nome" name="name" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="comment-form__input-box">
                                        <input type="email" placeholder="Seu E-mail" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Seu Telefone" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Assunto" name="subject_message">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mt-4 mb-4">
                                        <div class="captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger"
                                                style="font-size: 10pt;padding: 9px 14px;" class="reload" id="reload">
                                                Recarregar
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input id="captcha" type="text" class="form-control"
                                            placeholder="Digite o Código acima" name="captcha" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="comment-form__input-box">
                                        <textarea name="message" placeholder="Escreva sua Mensagem"></textarea>
                                    </div>
                                    <button type="submit" class="thm-btn comment-form__btn">Enviar Mensagem</button>
                                </div>
                            </div>

                            <input type="text" name="attention" autocomplete="off">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Page End-->

    <!--Contact Page Google Map Start-->
    <section class="contact-page-google-map">

    </section>
    <!--Contact Page Google Map End-->
@endsection


@section('js_after')
    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: '{{ route('site-reload-captcha') }}',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
@endsection
