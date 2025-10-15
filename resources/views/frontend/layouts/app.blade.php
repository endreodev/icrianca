<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instituto Desportivo da Criança</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('public') }}/frontend/assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public') }}/global/favicon@32x.png">
    <link rel="manifest" href="{{ asset('public') }}/frontend/assets/images/favicons/site.webmanifest" />
    <meta name="description" content="" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    @yield('css_before')


    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet"
        href="{{ asset('public') }}/frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/icomoon-icons/style.css">
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="{{ asset('public') }}/frontend/assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/vendors/twentytwenty/twentytwenty.css" />
    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/css/zilom.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/css/zilom-responsive.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/css/custom.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/css/slide.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/css/custom_imgs.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/css/custom_responsive.css" />
    <script src="https://kit.fontawesome.com/5732215c8e.js" crossorigin="anonymous"></script>

    @yield('css_after')

    {!! RecaptchaV3::initJs() !!}

    <style>
        .grecaptcha-badge {
            z-index: 1000;
        }
    </style>
</head>

<body>

    <div class="preloader">
        <img class="preloader__image" width="200" src="{{ asset('public') }}/frontend/assets/images/loader2.png"
            alt="" />
    </div>

    <!-- /.preloader -->
    <div class="page-wrapper">

        <header class="main-header main-header--two clearfix">

            <div class="main-header-two__bottom">
                <div class="container">
                    <div class="main-header-two__bottom-inner clearfix">
                        <nav class="main-menu main-menu--1">
                            <div class="main-menu__inner">
                                <div class="left">
                                    <div class="logo-box1">
                                        <a href="{{ route('frontend.home') }}">
                                            <img src="{{ asset('public') }}/frontend/assets/images/resources/logo.png"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>

                                <div class="middle">
                                    <ul class="main-menu__list">
                                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                        <li class="dropdown">
                                            <a href="{{ route('frontend.abouts') }}">O Instituto</a>
                                            <ul>
                                                <li><a href="{{ route('frontend.abouts') }}#sobre">Sobre</a></li>
                                                <li><a href="{{ route('frontend.abouts') }}#principios">Missão, Visão
                                                        e
                                                        Valores</a></li>
                                                <li><a href="{{ route('frontend.abouts') }}#numeros">Instituto em
                                                        Números</a></li>
                                                <li><a href="{{ route('frontend.abouts') }}#equipe">A Equipe</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('frontend.programs') }}">Programas e Projetos</a>
                                            <ul>
                                                <li><a href="{{ route('frontend.programs') }}">Programas</a></li>
                                                <li><a href="{{ route('frontend.action-lines') }}">Linhas de Ação</a>
                                                </li>
                                                <li><a href="{{ route('frontend.units') }}">Locais de Atuação</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('frontend.actions') }}">Ações</a></li>
                                        <li><a href="{{ route('frontend.partners') }}" class="">Parceiros</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('frontend.reports') }}" class="">
                                                Transparência
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('frontend.contacts') }}" class="">Contatos</a>
                                        </li>
                                        <li class="sys-button">
                                            <a href="{{ route('backend.login') }}"
                                                style="background: #475ddd;padding-left: 10px;margin-bottom: 20px;margin-top: 20px;border-radius: 5px;">
                                                Área do Educador
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="right">
                                    <div class="main-menu__right">
                                        <div class="main-menu__right-cart-search">
                                            <div class="main-menu__right-search-box">
                                                <a href="{{ route('backend.login') }}" class="thm-btn">
                                                    Área do Educador
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>

        </header>


        @yield('content')


        <!--Start Newsletter One-->
        <section class="newsletter-one">
            <div class="container">
                <div class="row">
                    <!--Start Newsletter One Left-->
                    <div class="col-xl-6 col-lg-6">
                        <div class="newsletter-one__left">
                            <div class="section-title">
                                <h2 class="section-title__title">Fique <br>Por Dentro
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!--End Newsletter One Left-->

                    <!--Start Newsletter One Right-->
                    <div class="col-xl-6 col-lg-6">
                        <div class="newsletter-one__right">
                            <div class="shape1 zoom-fade"><img
                                    src="{{ asset('public') }}/frontend/assets/images/shapes/thm-shape2.png"
                                    alt="" />
                            </div>
                            <div class="shape2 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                                <img src="{{ asset('public') }}/frontend/assets/images/shapes/thm-shape3.png"
                                    alt="" />
                            </div>
                            <div class="newsletter-form wow slideInDown" data-wow-delay="100ms"
                                data-wow-duration="1500ms">
                                <span class="span-email_newsletter">Escreva aqui seu email para receber nossos
                                    informativos</span>
                                <form action="{{ route('frontend.newsletter.save') }}" method="POST">
                                    @csrf
                                    {!! RecaptchaV3::field('register') !!}
                                    <input type="text" class="email_newsletter" name="email"
                                        placeholder="Escreva aqui seu email para receber nossos informativos">
                                    <button type="submit">
                                        <span class="icon-paper-plane"></span>
                                    </button>
                                    <div class="newsletter-one__right-checkbox">
                                        <input type="checkbox" name="agree " id="agree" checked required>
                                        <label for="agree">
                                            <span></span>
                                            Eu concordo com a política de
                                            privacidade
                                        </label>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!--End Newsletter One Right-->
                </div>
            </div>
        </section>
        <!--End Newsletter One-->




        <!--Start Footer One-->
        <footer class="footer-one">
            <div class="footer-one__bg">
            </div><!-- /.footer-one__bg -->
            <div class="footer-one__top">
                <div class="container">
                    <div class="row">
                        <!--Start Footer Widget Column-->
                        <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.1s">
                            <div class="footer-widget__column footer-widget__about">
                                <div class="footer-widget__about-logo">
                                    <a href="{{ route('frontend.home') }}"><img
                                            src="{{ asset('public') }}/frontend/assets/images/resources/logo-negativa.png"
                                            class="" height="60" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <!--End Footer Widget Column-->

                        <!--Start Footer Widget Column-->
                        <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.3s">
                            <div class="footer-widget__column footer-widget__courses">
                                <h3 class="footer-widget__title">Programas</h3>
                                <ul class="footer-widget__courses-list list-unstyled">
                                    @foreach ($boot_programs as $program)
                                        <li><a
                                                href="{{ route('frontend.programs.show', [$program->getId(), $program->getSlug()]) }}">{!! $program->name !!}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <!--End Footer Widget Column-->

                        <!--Start Footer Widget Column-->
                        <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.5s">
                            <div class="footer-widget__column footer-widget__links">
                                <h3 class="footer-widget__title">Links</h3>
                                <ul class="footer-widget__links-list list-unstyled">
                                    <li><a href="{{ route('frontend.abouts') }}">Sobre Nós</a></li>

                                    <li><a href="{{ route('frontend.units') }}">Polos de Atuação</a></li>
                                    <li><a href="{{ route('frontend.action-lines') }}">Linhas de Ação</a></li>
                                    <li><a href="{{ route('frontend.contacts') }}">Contato</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--End Footer Widget Column-->

                        <!--Start Footer Widget Column-->
                        <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.7s">
                            <div class="footer-widget__column footer-widget__contact">
                                <h3 class="footer-widget__title">Contato</h3>
                                <p class="text">{!! $boot_definitions->address !!} </p>
                                <p><a href="mailto:{!! $boot_definitions->email_site !!}">{!! $boot_definitions->email_site !!}</a></p>
                                <p class="phone"><a href="tel:{!! $boot_definitions->phone !!}">{!! $boot_definitions->phone !!}</a>
                                </p>
                            </div>
                        </div>
                        <!--End Footer Widget Column-->

                        <!--Start Footer Widget Column-->
                        {{-- <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.9s">
                            <div class="footer-widget__column footer-widget__social-links">
                                <ul class="footer-widget__social-links-list list-unstyled clearfix">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div> --}}
                        <!--End Footer Widget Column-->

                    </div>
                </div>
            </div>

            <!--Start Footer One Bottom-->
            <div class="footer-one__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-one__bottom-inner">
                                <div class="footer-one__bottom-text text-center">
                                    <p>&copy; Copyright 2022 por <a href="http://harmonysistemas.com.br/"
                                            style="color: white" target="_blank">Harmony Sistemas</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Footer One Bottom-->
        </footer>
        <!--End Footer One-->

    </div><!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="{{ route('frontend.home') }}" aria-label="logo image">
                    <img src="{{ asset('public') }}/frontend/assets/images/resources/mobilemenu_logo.png"
                        width="155" alt="" />
                </a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            {{-- <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top --> --}}
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->



    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn2">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    @if ($errors->any() or Session::has('alert'))
        <!-- Modal Alerts -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{!! session('alert.strong') ? session('alert.strong') : 'Atenção, corriga os erros abaixo.' !!}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-unstyled m-0">
                            @foreach ($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                        {!! session('alert.message') !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-{{ $errors->any() ? 'danger' : 'success' }}"
                            data-bs-dismiss="modal">Fechar</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                </div>
            </div>
        </div>
    @endif



    {{-- <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a> --}}

    @yield('js_before')

    <script src="{{ asset('public') }}/frontend/assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js">
    </script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js">
    </script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/odometer/odometer.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/swiper/swiper.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/wow/wow.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/isotope/isotope.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/countdown/countdown.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/twentytwenty/twentytwenty.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/twentytwenty/jquery.event.move.js"></script>
    <script src="{{ asset('public') }}/frontend/assets/vendors/parallax/parallax.min.js"></script>


    {{-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script> --}}

    <!-- template js -->
    <script src="{{ asset('public') }}/frontend/assets/js/zilom.js"></script>

    @yield('js_after')


    @if ($errors->any() or Session::has('alert'))
        <script>
            var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});
            document.onreadystatechange = function() {
                myModal.show();
            };
        </script>
    @endif

</body>

</html>
