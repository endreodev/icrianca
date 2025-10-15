@extends('frontend.layouts.app')

@section('css_after')
    <style>
        .blog-one__single-img img {
            height: 200px !important;
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
        style="background-image: url('{{$boot_definitions->getImage('originals', 'bg_units')}}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>Polos</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('frontend.home')}}">Home</a></li>
                                <li class="active">Polos</li>
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
                <h2 class="section-title__title">Conheça Nossos Locais De Atuação</h2>
            </div>
            <div class="row">
                @foreach ($units as $unit)
                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <img src="{{ $unit->getImage([500, 200]) }}" alt="" />
                            </div>
                            <div class="blog-one__single-content ">
                                <div class="blog-one__single-content-overlay-mata-info tag-polo">
                                    <ul class="list-unstyled text-center">
                                        <li>
                                            <a href="{{ $unit->getLinkMap() }}" target="_blank">
                                                <span class="icon-map"></span>
                                                🗺️ Ver no Mapa
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <h2 class="blog-one__single-content-title">
                                    <a href="{{ route('frontend.units.show', [$unit->getId(), $unit->getSlug()]) }}">
                                        {!! $unit->name !!}
                                    </a>
                                </h2>
                                <p class="blog-one__single-content-text">
                                    {{-- {!! mb_strimwidth($unit->description, 0, 150, '...') !!} --}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">

                <div class="d-flex justify-content-center">
                    {!! $units->links() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
