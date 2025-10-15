@extends('frontend.layouts.app')



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
        style="background-image: url('{{$boot_definitions->getImage('originals', 'bg_programs')}}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>Programas</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('frontend.home')}}">Home</a></li>
                                <li class="active">Programas</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->


    <!--Courses One Start-->
    <section class="courses-one courses-one--courses">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title">Conheça Nossos Programas</h2>
            </div>

            <div class="row" style="display: none">
                <!--Start case-studies-one Top-->
                <div class="courses-one--courses__top">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="courses-one--courses__menu-box">
                            <ul class="project-filter clearfix post-filter has-dynamic-filters-counter list-unstyled">
                                <li data-filter=".filter-item" class="active"><span
                                        class="filter-text">Todos</span>
                                </li>
                                <li data-filter=".featured"><span class="filter-text">Esportes</span></li>
                                <li data-filter=".business"><span class="filter-text">Educação Musical</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End case-studies-one Top-->
            </div>


            <div class="row filter-layout masonary-layout">

                @foreach ($programs as $key => $program)
                    <!--Start Single Courses One-->
                    <div class="col-xl-4 col-lg-6 col-md-6 filter-item development business">
                        <div class="courses-one__single wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
                            <div class="courses-one__single-img">
                                <img src="{{ $program->getImage([500,300], 'institutional_image') }}" alt="" />
                                {{-- <div class="overlay-text">
                                    <p>Educação Musical</p>
                                </div> --}}
                            </div>
                            <div class="courses-one__single-content">
                                <div class="courses-one__single-content-overlay-img">
                                    <img src="{{ $program->getImage('originals') }}" alt="" height="50px" />
                                </div>
                                <h6 class="courses-one__single-content-name"></h6>
                                <h4 class="courses-one__single-content-title">
                                    <a href="{{ route('frontend.programs.show', [$program->getId(), $program->getSlug()]) }}">
                                        {!!$program->name!!}
                                    </a>
                                </h4>
                                <ul class="courses-one__single-content-courses-info list-unstyled">
                                    <li>Disponível em 10 polos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End Single Courses One-->
                @endforeach


            </div>
        </div>
    </section>
    <!--Courses One End-->
@endsection
