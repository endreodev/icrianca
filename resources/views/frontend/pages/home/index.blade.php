@extends('frontend.layouts.app')

@section('css_after')
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/css/slick.css" />
    <link rel="stylesheet" href="{{ asset('public') }}/frontend/assets/css/swiper.css" />
    <style>
        .blog-one__single-img.--custom-heigth img {
            height: 190px !important;
        }
    </style>
@endsection

@section('content')
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content">
        </div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->


    <section class="slider_idc">
        @foreach ($slides as $key => $slide)
            <div class="item">
                <div class="mask"></div>
                <div class="bg-color"></div>
                <figure class="image" style="background-image: url('{{ $slide->getImage('originals') }}')">

                </figure>
                <div class="polygon"></div>
                <div class="brand">
                    <img src="{{ asset('public') }}/frontend/assets/images/slide/brand.png" alt="">
                </div>
                <div class="children">
                    <img src="{{ asset('public') }}/frontend/assets/images/slide/children.png" alt="">
                </div>
            </div>
        @endforeach
    </section>


    <!--Features One Start-->
    <section class="features-one" style="padding-top: 0;">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center my-5">
                    <h3>Nossos Programas</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($programs as $key => $item)
                    <!--Start Single Features One-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="features-one__single">
                            <div class="features-one__single-icon">
                                <i>
                                    <img src="{{ $item->getImage() }}" height="90px" alt="">
                                </i>
                            </div>
                            <div class="features-one__single-text">
                                <h4><a
                                        href="{{ route('frontend.programs.show', [$item->getId(), $item->getSlug()]) }}">{!! $item->name !!}</a>
                                </h4>
                                <p>Leia mais sobre o programa</p>
                            </div>
                        </div>
                    </div>
                    <!--End Single Features One-->
                @endforeach
            </div>
        </div>
    </section>
    <!--Features One End-->



    <!--About One Start-->
    <section class="about-one clearfix">
        <div class="container">
            <div class="row">
                <!-- Start About One Left-->
                <div class="col-xl-6">
                    <div class="about-one__left">
                        <ul class="about-one__left-img-box list-unstyled clearfix">
                            @foreach ($about_galleries as $key => $about_gallery)
                                <li class="about-one__left-single">
                                    <div class="about-one__left-img{{ $key + 1 }}">
                                        <img src="{!! $about_gallery->getImage([300, 550]) !!}" alt="Banner Vertical" />
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="about-one__left-overlay">
                            <div class="icon">
                                <span class="icon-relationship"></span>
                            </div>
                            <div class="title">
                                <h6>Já foram mais de <br>{!! \Functions::formatInteger($count->students) !!} alunos participantes</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End About One Left-->


                <!-- Start About One Right-->
                <div class="col-xl-6">
                    <div class="about-one__right">
                        <div class="section-title">
                            <span class="section-title__tagline">{!! $about->hat_home !!}</span>
                            <h2 class="section-title__title">{!! $about->title_home !!}</h2>
                        </div>
                        <div class="about-one__right-inner">
                            {!! $about->summary_home !!}
                            <div class="about-one__btn">
                                <a href="{{ route('frontend.abouts') }}" class="th-btn">Saiba Mais sobre o
                                    Instituto</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End About One Right-->
            </div>
        </div>
    </section>
    <!--About One End-->

    <!--Start Cta One-->
    <section class="cta-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cta-one__wrapper wow slideInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <div class="shape1"><img src="{{ asset('public') }}/frontend/assets/images/shapes/thm-shape5.png"
                                alt="" /></div>
                        <div class="cta-one__left">
                            <h2 class="cta-one__left-text">Veja nossos relatórios anuais</h2>
                        </div>
                        <div class="cta-one__right">
                            <div class="cta-one__right-btn">
                                <a href="{{ route('frontend.reports') }}" class="th-btn">Página de Relatórios</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Cta One-->


    <!--Blog One Start-->
    <section class="blog-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Multimídia</span>
                <h2 class="section-title__title">Nossas Ações</h2>
            </div>
            <div class="row">
                @foreach ($actions as $key => $action)
                    <!--Start Single Blog One-->
                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img --custom-heigth">
                                <img src="{{ $action->getImage([500, 500]) }}" alt="" />
                            </div>
                            <div class="blog-one__single-content">
                                <div class="blog-one__single-content-overlay-mata-info tag-polo">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span class="icon-clock"></span>
                                            {!! $action->created_at->format('d/m/Y') !!}
                                        </li>
                                    </ul>
                                </div>
                                <h2 class="blog-one__single-content-title">
                                    <a href="{{ route('frontend.actions.show', [$action->getId(), $action->getSlug()]) }}">
                                        {!! $action->title !!}
                                    </a>
                                </h2>
                                <p class="blog-one__single-content-text">
                                    {!! mb_strimwidth(strip_tags($action->text), 0, 150, '...') !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--End Single Blog One-->
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{ route('frontend.actions') }}" class="th-btn">
                    Ver mais Ações
                </a>
            </div>
        </div>
    </section>
    <!--Blog One End-->

    <!-- INSTAGRAM-->
    <section class="blog-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Multimídia</span>
                <h2 class="section-title__title">Nosso Instagram</h2>
            </div>
            <div class="row">
                @foreach ($posts_instagram as $post_instagram)
                    <!--Start Single Blog One-->
                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <img src="{{ $post_instagram->getImage([370, 370]) }}" alt="" />
                            </div>
                            <div class="blog-one__single-content">
                                <div class="blog-one__single-content-overlay-mata-info tag-polo">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="{{ $post_instagram->link }}" target="_blank">
                                                <i class="fa-brands fa-instagram"></i> Ver no Instagram
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Blog One-->
                @endforeach
            </div>
            <div class="text-center">
                <a href="https://www.instagram.com/idc_voleikids/" target="_blank" class="th-btn"><i
                        class="fa-brands fa-instagram"></i> Ir
                    para o
                    Instagram</a>
            </div>
        </div>
    </section>
    <!-- INSTAGRAM End-->

    <!--Testimonials One Start-->
    <section class="testimonials-one clearfix">
        <div class="auto-container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Depoimentos</span>
                <h2 class="section-title__title">O que dizem?</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testimonials-one__wrapper">
                        <div class="testimonials-one__pattern">
                            <img src="{{ asset('public') }}/frontend/assets/images/pattern/testimonials-one-left-pattern.png"
                                alt="" />
                        </div>
                        <div class="shape1">
                            <img src="{{ asset('public') }}/frontend/assets/images/shapes/thm-shape3.png"
                                alt="" />
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="testimonials-one__carousel owl-carousel owl-theme owl-dot-type1">

                                    @foreach ($testimonials as $key => $testimonial)
                                        <!--Start Single Testimonials One -->
                                        <div class="testimonials-one__single wow fadeInUp" data-wow-delay="0ms"
                                            data-wow-duration="1500ms">
                                            <div class="testimonials-one__single-inner">
                                                <h4 class="testimonials-one__single-title">
                                                    {!! $testimonial->title !!}
                                                </h4>
                                                <p class="testimonials-one__single-text">
                                                    {!! strip_tags(\Functions::limitCharacters($testimonial->text, 350)) !!}... <br>
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#testimonial-{{ $key }}">Ler Mais</a>
                                                </p>
                                                <div class="testimonials-one__single-client-info">
                                                    <div class="testimonials-one__single-client-info-img">
                                                        <img src="{{ $testimonial->getImage([100, 100]) }}"
                                                            alt="" />
                                                    </div>
                                                    <div class="testimonials-one__single-client-info-text">
                                                        <h5>{!! $testimonial->name !!}</h5>
                                                        <p>{!! $testimonial->office !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($testimonials as $key => $testimonial)
                        <!-- Modal -->
                        <div class="modal fade" id="testimonial-{{ $key }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{!! $testimonial->title !!}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $testimonial->text !!}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Fechar</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Single Testimonials One -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Testimonials One End-->

    <!--Company Logos One Start-->
    <section class="company-logos-one">
        <div class="container">
            <div class="company-logos-one__title text-center">
                <h6>Parceiros Mantenedores</h6>
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
                                <img src="{{ $partner->getImage('originals') }}" alt="">
                            </a>
                        </div><!-- /.swiper-slide -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="thm-swiper__slider swiper-container mt-5"
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
                                <img src="{{ $partner->getImage('originals') }}" alt="">
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
            <div class="company-logos-one__title text-center">
                <h6>Parceiros Institucionais</h6>
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
                                <img src="{{ $partner->getImage('originals') }}" alt="">
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





    <!--Registration One Start-->
    <section class="registration-one jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%">
        <div class="registration-one__bg" style="background-image: url(assets/images/resources/bg.jpg);"></div>
        <div class="container">
            <div class="row">
                <!--Start Registration One Left-->
                <div class="col-xl-7 col-lg-7">
                    <div class="registration-one__left">
                        <div class="section-title">
                            <span class="section-title__tagline">Ajude a manter o instituto</span>
                            <h2 class="section-title__title">Como apoiar? </h2>
                        </div>
                        <p class="registration-one__left-text">Há várias formas de ajudar o Instituto Desportivo da
                            Criança, escolha a sua e faça a doação de forma segura! Você pode doar diretamente (PIX
                            ou Boleto Mensal) ou Doar parte do Imposto de Renda
                            .</p>
                    </div>
                </div>
                <!--End Registration One Left-->

                <style>
                    .form-control-recptcha input[name=attention] {
                        opacity: 0;
                        height: 1px;
                        line-height: 0px;
                    }
                </style>

                <!--Start Registration One Right-->
                <div class="col-xl-5 col-lg-5">
                    <div class="registration-one__right wow slideInRight" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <div class="registration-one__right-form">
                            <div class="title-box">
                                <h4>Quero ajudar o Projeto!</h4>
                            </div>
                            <div class="form-box form-control-recptcha">
                                <form method="post" autocomplete="off"
                                    action="{{ route('frontend.forms.send', 'how-to-support') }}">
                                    @csrf

                                    {!! RecaptchaV3::field('register') !!}
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Meu Nome" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Meu E-mail" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="Meu Telefone" required>
                                    </div>
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


                                    <div class="form-group">
                                        <textarea name="message" placeholder="Mensagem Opcional"></textarea>
                                    </div>
                                    <button class="registration-one__right-form-btn" type="submit" name="submit-form">
                                        <span class="th-btn">Receber Orientação</span>
                                    </button>
                                    <input type="text" name="attention" autocomplete="off">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Registration One Right-->
            </div>
        </div>
    </section>
    <!--Registration One End-->
@endsection


@section('js_after')
    <script src="{{ asset('public') }}/frontend/assets/js/slick.min.js"></script>

    <script type="text/javascript">
        $('.slider_idc').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            autoplay: true,
            autoplaySpeed: 7000,

            prevArrow: "<button type='button' class='slick-prev pull-left'><span class='icon-left'></span></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><span class='icon-right'></span></button>"
        });
    </script>

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
