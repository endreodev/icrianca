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
        style="background-image: url('{{$boot_definitions->getImage('originals', 'bg_actions_line')}}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>Linhas de Ação</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('frontend.home')}}">Home</a></li>
                                <li class="active">Linhas de Ação</li>
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
                <h3>Os projetos são elaborados com base nas Linhas de Ação</h3>
            </div>

            <section>
                <div class="container">
                    <div class="row">
                        @foreach ($action_lines as $key => $action_line)
                            <!--Linhas de Ação-->
                            <div class="col-xl-12 col-lg-12 my-4 py-2 text-center d-flex flex-column"
                                style="border: 1px solid rgb(192, 192, 192); border-radius:8px; align-items: center;">
                                <img src="{{ $action_line->getImage([152,132])}}" alt="" style="max-width: 152px">
                                {!! $action_line->description !!}
                            </div>
                        @endforeach

                        <!--Fim das Linhas de Ação-->
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!--Courses One End-->
@endsection
