@extends('frontend.layouts.app')



@section('content')
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content">

        </div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->



    <!--Page Header Start-->
    <section class="page-header clearfix" style="background-image: url({{ $unit->getImage() }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>{!! $unit->name !!}</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li><a href="{{ route('frontend.units') }}">Polos</a></li>
                                <li class="active">Detalhes do Polo</li>
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
                <div class="col-xl-12 col-lg-12">
                    <div class="course-details__content">
                        <!--Start Single Courses One-->
                        <div class="courses-one__single style2 wow fadeInLeft" data-wow-delay="0ms"
                            data-wow-duration="1000ms">
                            <div class="courses-one__single-img">
                                <img src="{{ $unit->getImage([1170, 778]) }}" alt="" />
                            </div>
                            <div class="courses-one__single-content">
                                <h4 class="courses-one__single-content-title pt-5">
                                    {!! $unit->name !!}
                                </h4>
                                <div class="course-details__content-text1">
                                    {!! $unit->description !!}
                                </div>


                                <div class="course-details__content-text1">
                                    {!! $unit->address !!}, {!! $unit->district !!}, {!! $unit->number !!} - {!! $unit->zipcode !!} <br>
                                    {!! $unit->city->name !!} - {!! $unit->state->name !!} | {!! $unit->state->country->name !!} <br>
                                    {!! $unit->phone !!} <br>
                                </div>



                                <section class="contact-page-google-map pt-5">
                                    <a href="{{ $unit->getLinkMap() }}" target="_blank">
                                        <span class="icon-map"></span>
                                        🗺️ Ver no Mapa
                                    </a>
                                </section>
                            </div>
                        </div>
                        <!--End Single Courses One-->


                    </div>
                </div>
                <!--End Course Details Content-->
            </div>
        </div>
    </section>
    <!--End Course Details-->
@endsection
