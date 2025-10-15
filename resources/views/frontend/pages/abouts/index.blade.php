@extends('frontend.layouts.app')



@section('content')
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content">

        </div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->
    <!--Page Header Start-->
    <section class="page-header clearfix"
        style="background-image: url({{ $about->getImage('_resizes', 'image_background') }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>{!! $about->title_the_institute !!}</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="active">{!! $about->title_the_institute !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--About Two Start-->
    <section class="about-two" id="sobre">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="about-two__single-img">
                        <img src="{{ $about->getImage('_resizes', 'image_featured') }}" alt="" />
                    </div>
                </div>
            </div>

            <div class="about-two__bottom-content">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="about-two__title-box">
                            <div class="section-title">
                                <span class="section-title__tagline">{!! $about->hat_the_institute !!}</span>
                                <h2 class="section-title__title">{!! $about->title_the_institute !!}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-8">
                        <div class="about-two__text-box">
                            {!! $about->the_institute !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Two End-->


    <!--Why Choose One Start-->
    <section class="why-choose-one" id="principios">
        <div class="container">
            <div class="row">
                <!--Start Why Choose One Left-->
                <div class="col-xl-6 col-lg-6">
                    <div class="why-choose-one__left">
                        <div class="section-title">
                            <span class="section-title__tagline">Nossos Princípios</span>
                            <h2 class="">Missão, Visão e Valores</h2>
                        </div>
                        <div class="why-choose-one__left-list">
                            <ul class="list-unstyled">
                                <li class="why-choose-one__left-list-single">
                                    <div class="icon">
                                        <span class="icon-confirmation"></span>
                                    </div>
                                    <div class="text">
                                        <p><strong>Missão: </strong>
                                            {!! $about->about_mission !!}
                                        </p>
                                    </div>
                                </li>

                                <li class="why-choose-one__left-list-single">
                                    <div class="icon">
                                        <span class="icon-confirmation"></span>
                                    </div>
                                    <div class="text">
                                        <p><strong>Visão: </strong>
                                            {!! $about->about_vision !!}
                                        </p>
                                    </div>
                                </li>

                                <li class="why-choose-one__left-list-single">
                                    <div class="icon">
                                        <span class="icon-confirmation"></span>
                                    </div>
                                    <div class="text">
                                        <p> <strong>Valores: </strong>
                                            {!! $about->about_values !!}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Why Choose One Left-->

                <!--Start Why Choose One Right-->
                <div class="col-xl-6 col-lg-6">
                    <div class="why-choose-one__right wow slideInRight animated clearfix" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <div class="why-choose-one__right-img clearfix">
                            <img src="{{ $about->getImage('originals', 'about_image_secondary') }}" alt="" />
                            <div class="why-choose-one__right-img-overlay">
                                <p>Nossos Princípios</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Why Choose One Right-->


            </div>
        </div>
    </section>
    <!--Why Choose One End-->



    <!--Counter One Start-->
    <section class="counter-one counter-one--about jarallax" id="numeros" data-jarallax data-speed="0.2"
        data-imgPosition="50% 0%">
        <div class="container">
            <div class="row">
                <!--Start Counter One Left-->
                <div class="col-xl-5 col-lg-5">
                    <div class="counter-one__left">
                        <div class="section-title">
                            <span class="section-title__tagline">Dados</span>
                            <h2 class="section-title__title">O Instituto em Números</h2>
                        </div>
                        <p class="counter-one__left-text">Conheça mais do Instituto com alguns de nossos números
                            atuais.</p>
                    </div>
                </div>
                <!--End Counter One Left-->

                <!--Start Counter One Right-->
                <div class="col-xl-7 col-lg-7">
                    <div class="counter-one__right">
                        <ul class="counter-one__right-box list-unstyled">
                            <!--Start Counter One Right Single-->
                            <!--End Counter One Right Single-->

                            <!--Start Counter One Right Single-->
                            <li class="counter-one__right-single wow slideInUp animated" data-wow-delay="0.3s"
                                data-wow-duration="1500ms">
                                <div class="counter-one__right-single-icon">
                                    <span class="icon-online-course"></span>
                                </div>
                                <h3 class="odometer" data-count="{{ $count->units }}">00</h3>
                                <p class="counter-one__right-text">Polos</p>
                            </li>
                            <!--Start Counter One Right Single-->
                            <li class="counter-one__right-single wow slideInUp animated" data-wow-delay="0.3s"
                                data-wow-duration="1500ms">
                                <div class="counter-one__right-single-icon">
                                    <span class="icon-online-course"></span>
                                </div>
                                <h3 class="odometer" data-count="{{ $count->classes }}">00</h3>
                                <p class="counter-one__right-text">Turmas</p>
                            </li>
                            <!--End Counter One Right Single-->

                            <!--Start Counter One Right Single-->
                            <li class="counter-one__right-single wow slideInUp animated" data-wow-delay="0.5s"
                                data-wow-duration="1500ms">
                                <div class="counter-one__right-single-icon">
                                    <span class="icon-student"></span>
                                </div>
                                <h3 class="odometer" data-count="{{ $count->students }}">00</h3>
                                <p class="counter-one__right-text">Alunos</p>
                            </li>
                            <!--End Counter One Right Single-->
                        </ul>
                    </div>
                </div>
                <!--End Counter One Right-->
            </div>
        </div>
    </section>
    <!--Counter One End-->


    <!--Start Meet Teachers One-->
    <section class="meet-teachers-one" id="equipe">
        <div class="container">
            <div class="section-title text-center">
                {{-- <span class="section-title__tagline">Por trás do Projeto</span> --}}
                <h2 class="section-title__title">Equipe</h2>
            </div>
            <div class="row">
                @foreach ($teams as $team)
                    <!--Start Single Meet Teachers One-->
                    <div class="col-xl-3 col-lg-3">
                        <div class="meet-teachers-one__single wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="meet-teachers-one__single-img">
                                <img src="{{$team->getImage()}}" alt="" />
                            </div>

                            <div class="meet-teachers-one__single-content">
                                <div class="meet-teachers-one__single-middle-content">
                                    <div class="title">
                                        <h4>
                                            {!!$team->name!!}
                                        </h4>
                                        <p>{!!$team->office!!}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                <!--End Single Meet Teachers One-->
            </div>
        </div>
    </section>
    <!--End Meet Teachers One-->
@endsection
