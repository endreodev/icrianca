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
    <section class="page-header clearfix" style="background-image: url('{{$boot_definitions->getImage('originals', 'bg_actions')}}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>Ações</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{route('backend.dashboard')}}">Home</a></li>
                                <li class="active">Ações</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->


    <!--Blog One Start-->
    <section class="blog-one blog-one--blog">
        <div class="container">
            <div class="row">
                @foreach ($actions as $key => $action)
                    <!--Start Single Blog One-->
                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <img src="{{ $action->getImage() }}" alt="" />
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
                                    <a
                                        href="{{ route('frontend.actions.show', [$action->getId(), $action->getSlug()]) }}">
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
            <div class="row">

                <div class="d-flex justify-content-center">
                    {!! $actions->links() !!}
                </div>
            </div>

        </div>
    </section>
@endsection
