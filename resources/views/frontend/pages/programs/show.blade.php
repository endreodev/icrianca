@extends('frontend.layouts.app')



@section('content')
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content">

        </div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->



    <!--Page Header Start-->
    <section class="page-header clearfix"
        style="background-image: url({{ $program->getImage('originals', 'institutional_image') }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>Detalhes do Programa</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="active">Detalhes do Programa</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Start Course Details-->
    <section class="course-details">
        <div class="container">
            <div class="row">
                <!--Start Course Details Content-->
                <div class="col-xl-8 col-lg-8">
                    <div class="course-details__content">
                        <!--Start Single Courses One-->
                        <div class="courses-one__single style2 wow fadeInLeft" data-wow-delay="0ms"
                            data-wow-duration="1000ms">
                            <div class="courses-one__single-img">
                                <img src="{{ $program->getImage('originals', 'institutional_image') }}" alt="" />
                                {{-- <div class="overlay-text">
                                    <p>Educação Musical</p>
                                </div> --}}
                            </div>
                            <div class="courses-one__single-content">
                                <div class="courses-one__single-content-overlay-img">
                                    <img src="{{ $program->getImage('originals') }}" alt="" height="60" />
                                </div>
                                <h4 class="courses-one__single-content-title">{!! $program->name !!}</h4>
                                <div class="course-details__content-text1">
                                    {!! $program->description !!}
                                </div>





                            </div>
                        </div>
                        <!--End Single Courses One-->


                    </div>
                </div>
                <!--End Course Details Content-->

                <!--Start Course Details Sidebar-->
                <div class="col-xl-4 col-lg-4">
                    <div class="course-details__sidebar">

                        <div class="course-details__new-courses wow fadeInUp animated" data-wow-delay="0.5s">
                            <h3 class="course-details__new-courses-title">Outros Programas</h3>
                            <ul class="course-details__new-courses-list list-unstyled">
                                @foreach ($others as $key => $other)
                                    <li class="course-details__new-courses-list-item">
                                        <div class="course-details__new-courses-list-item-img">
                                            <img src="{{ $other->getImage([100,100]) }}" alt="" height="80px" />
                                        </div>
                                        <div class="course-details__new-courses-list-item-content">
                                            <h4 class="course-details__new-courses-list-item-content-title">
                                                <a href="{{ route('frontend.programs.show', [$other->getId(), $other->getSlug()]) }}">
                                                    {!!$other->name!!}
                                                </a>
                                            </h4>
                                            <p class="course-details__new-courses-price">Ver Programa</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Course Details Sidebar-->
            </div>
        </div>
    </section>
    <!--End Course Details-->
@endsection
