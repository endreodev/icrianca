@extends('frontend.layouts.app')

@section('css_after')
    <style>
        .blog-one__single-img img {
            height: 190px !important;
        }
    </style>
@endsection

@section('content')
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content">

        </div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->


    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content">

        </div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->


    <!--Page Header Start-->
    <section class="page-header clearfix"
        style="background-image: url('{{ $boot_definitions->getImage('originals', 'bg_reports') }}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>Transparência</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="active">Transparência</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->


    <section class="blog-one blog-one--blog">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title">Relatórios Anuais</h2>
            </div>
            <div class="row">
                @foreach ($reports as $report)
                    <div class="col-xl-4 col-lg-4 wow fadeInLeft text-center" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <img src="{{ $report->getImage([500, 300]) }}" alt="" />
                            </div>
                            <div class="blog-one__single-content">
                                <div class="blog-one__single-content-overlay-mata-info tag-polo">
                                    <ul class="list-unstyled">
                                        <li><a href="{{ route('frontend.reports.show', [$report->getId(), $report->getSlug()]) }}"
                                                target="_blank"><span class="icon-map"></span>📃
                                                Abrir
                                                Documento</a></li>
                                    </ul>
                                </div>
                                <h4 class="">
                                    <a
                                        href="{{ route('frontend.reports.show', [$report->getId(), $report->getSlug()]) }}">
                                        {!! $report->title !!}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">

                <div class="d-flex justify-content-center">
                    {!! $reports->links() !!}
                </div>
            </div>
        </div>
    </section>

    <section class="cta-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cta-one__wrapper wow slideInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <div class="shape1"><img src="assets/images/shapes/thm-shape5.png" alt="" /></div>
                        <div class="cta-one__left">
                            <h2 class="cta-one__left-text">ESTATUTO SOCIAL</h2>
                            <p class="text-white">O IDC é uma pessoa jurídica de direito privado, sem fins
                                lucrativos, com autonomia
                                administrativa e financeira, regendo-se pelo presente Estatuto que segue disponível
                                para consulta: </p>
                        </div>
                        <div class="cta-one__right">
                            <div class="cta-one__right-btn">
                                <a href="{{ $about->url_social_status }}" target="_blank" class="thm-btn">Link de
                                    Consulta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
