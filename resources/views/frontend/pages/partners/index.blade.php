@extends('frontend.layouts.app')

@section('css_after')
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/css/swiper.css" />
@endsection


@section('content')
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content">

        </div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->


    <!--Page Header Start-->
    <section class="page-header clearfix"
        style="background-image: url('{{$boot_definitions->getImage('originals', 'bg_partners')}}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>Parceiros</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="active">parceiros</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--About Two Start-->
    <section class="about-two" style="padding: 120px 0px 60px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="about-two__single-img">
                        <img src="{{$boot_definitions->getImage('originals', 'image_1_partner')}}" alt="" />
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="about-two__single-img">
                        <img src="{{$boot_definitions->getImage('originals', 'image_2_partner')}}" alt="" />
                    </div>
                </div>
            </div>

            <div class="about-two__bottom-content">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="about-two__title-box">
                            <div class="section-title">
                                <span class="section-title__tagline">Colaboradores</span>
                                <h2 class="section-title__title">Eles fazem acontecer </h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-8">
                        <div class="about-two__text-box">
                            <p class="about-two__text-box-text">Confira nossos apoiadores. Eles fazem os projetos do IDC
                                sairem do
                                papel e ajudam a impactar centenas de crianças.</p>
                            <div class="about-two__text-box-btn">
                                <a href="{{ route('frontend.contacts') }}" class="th-btn">Quero fazer parte!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Two End-->



    <!--Company Logos One Start-->
    <section class="company-logos-one">
        <div class="container">
            <div class="company-logos-one__title text-center" style="padding-top:30px;">
                <h2>Parceiros Mantenedores</h2>
            </div>
            <div class="thm-swiper__slider swiper-container"
                data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                "0": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "375": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "575": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "767": {
                    "spaceBetween": 50,
                    "slidesPerView": 3
                },
                "991": {
                    "spaceBetween": 50,
                    "slidesPerView": 4
                },
                "1199": {
                    "spaceBetween": 100,
                    "slidesPerView": 4
                }
                            }}'>
                <div class="swiper-wrapper">
                    @foreach ($partners_1_1 as $partner)
                        <div class="swiper-slide">
                            <a href="{{ $partner->url }}" target="_blank">
                                <img src="{{ $partner->getImage() }}" alt="">
                            </a>
                        </div><!-- /.swiper-slide -->
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="thm-swiper__slider swiper-container pt-5 mt-5"
                data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                "0": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "375": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "575": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "767": {
                    "spaceBetween": 50,
                    "slidesPerView": 3
                },
                "991": {
                    "spaceBetween": 50,
                    "slidesPerView": 4
                },
                "1199": {
                    "spaceBetween": 100,
                    "slidesPerView": 4
                }
                        }}'>
                <div class="swiper-wrapper">
                    @foreach ($partners_1_2 as $partner)
                        <div class="swiper-slide">
                            <a href="{{ $partner->url }}" target="_blank">
                                <img src="{{ $partner->getImage() }}" alt="">
                            </a>
                        </div><!-- /.swiper-slide -->
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
    <!--Company Logos One End-->

    <!--Company Logos One Start-->
    <section class="company-logos-one">
        <div class="container">
            <div class="company-logos-one__title text-center" style="padding-top:30px;">
                <h2>Parceiros Institucionais</h2>
            </div>
            <div class="thm-swiper__slider swiper-container"
                data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                "0": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "375": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "575": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "767": {
                    "spaceBetween": 50,
                    "slidesPerView": 3
                },
                "991": {
                    "spaceBetween": 50,
                    "slidesPerView": 4
                },
                "1199": {
                    "spaceBetween": 100,
                    "slidesPerView": 4
                }
                                    }}'>
                <div class="swiper-wrapper">
                    @foreach ($partners_2 as $partner)
                        <div class="swiper-slide">
                            <a href="{{ $partner->url }}" target="_blank">
                                <img src="{{ $partner->getImage() }}" alt="">
                            </a>
                        </div><!-- /.swiper-slide -->
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
    <!--Company Logos One End-->
    <!--Company Logos One End-->
@endsection
