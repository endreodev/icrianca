@extends('frontend.layouts.app')



@section('content')
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content">

        </div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->

    <!--Page Header Start-->
    <section class="page-header clearfix"
        style="background-image: url({{$action->getImage('originals')}});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>
                                {!! $action->title !!}
                            </h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="active">Ações</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--News Details Start-->
    <section class="news-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="news-details__left">
                        <div class="blog-one__single style2">
                            <div class="blog-one__single-content">
                                <div class="blog-one__single-content-overlay-mata-info">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span class="icon-clock"></span> {!! $action->created_at->format('d/m/Y') !!}
                                        </li>
                                        <li>
                                            > {!! $action->getType() !!}
                                        </li>

                                    </ul>
                                </div>
                                <h2 class="blog-one__single-content-title">
                                    {!! $action->title !!}
                                </h2>
                            </div>
                        </div>
                        <div class="blog-one__single-img">
                            <img src="{{ $action->getImage('originals') }}" alt="" />
                        </div>
                        @if($action->getVideo())
                        <div class="video-container">
                            {!! $action->getVideo() !!}
                            </iframe>
                        </div>
                        @endif

                        <div class="news-details__text1">
                            {!! $action->text !!}
                        </div>

                        <section id="gallery">
                            <div class="container">
                                <div id="image-gallery">
                                    <div class="row">
                                        @foreach ($action->photos($action->type)->get() as $item)
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                                <div class="img-wrapper">
                                                    <a href="{{$item->getImage('originals')}}">
                                                        <img src="{{$item->getImage('_thumbs')}}" class="img-responsive">
                                                    </a>
                                                    <div class="img-overlay">
                                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div><!-- End row -->
                                </div><!-- End image gallery -->
                            </div><!-- End container -->
                        </section>

                        <ul class="footer-widget__social-links-list list-unstyled clearfix mt-5">
                            <p>Compartilhe essa Ação</p>
                            <li><a href="#" style="background-color: #01ba59;"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li><a href="#" style="background-color: #01ba59;"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li><a href="#" style="background-color: #01ba59;"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li><a href="#" style="background-color: #01ba59;"><i class="fab fa-dribbble"></i></a>
                            </li>
                        </ul>

                    </div>
                </div>

                <!--Start Sidebar-->
                <div class="col-xl-4 col-lg-5" style="margin-top:120px;">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__post wow fadeInUp animated" data-wow-delay="0.1s">
                            <h3 class="sidebar__title">Últimas Ações</h3>
                            <ul class="sidebar__post-list list-unstyled">

                                @foreach ($lasted as $last)
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ $last->getImage('_thumbs') }}" width="59x" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <p>
                                                        <a href="#">
                                                            <i class="far fa-user-circle"></i>
                                                            {!! $last->getType() !!}
                                                        </a>
                                                    </p>
                                                    <h3>
                                                        <a
                                                            href="{{ route('frontend.actions.show', [$last->getId(), $last->getSlug()]) }}">
                                                            {!! $last->title !!}
                                                        </a>
                                                    </h3>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach




                            </ul>
                        </div>

                    </div>
                </div>
                <!--End Sidebar-->
            </div>
        </div>
    </section>
    <!--News Details End-->
@endsection


@section('js_after')
    <script>
        // Gallery image hover
        $(".img-wrapper").hover(
            function() {
                $(this).find(".img-overlay").animate({
                    opacity: 1
                }, 600);
            },
            function() {
                $(this).find(".img-overlay").animate({
                    opacity: 0
                }, 600);
            }
        );

        // Lightbox
        var $overlay = $('<div id="overlay"></div>');
        var $image = $("<img>");
        var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
        var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
        var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');

        // Add overlay
        $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
        $("#gallery").append($overlay);

        // Hide overlay on default
        $overlay.hide();

        // When an image is clicked
        $(".img-overlay").click(function(event) {
            // Prevents default behavior
            event.preventDefault();
            // Adds href attribute to variable
            var imageLocation = $(this).prev().attr("href");
            // Add the image src to $image
            $image.attr("src", imageLocation);
            // Fade in the overlay
            $overlay.fadeIn("slow");
        });

        // When the overlay is clicked
        $overlay.click(function() {
            // Fade out the overlay
            $(this).fadeOut("slow");
        });

        // When next button is clicked
        $nextButton.click(function(event) {
            // Hide the current image
            $("#overlay img").hide();
            // Overlay image location
            var $currentImgSrc = $("#overlay img").attr("src");
            // Image with matching location of the overlay image
            var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
            // Finds the next image
            var $nextImg = $($currentImg.closest(".image").next().find("img"));
            // All of the images in the gallery
            var $images = $("#image-gallery img");
            // If there is a next image
            if ($nextImg.length > 0) {
                // Fade in the next image
                $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
            } else {
                // Otherwise fade in the first image
                $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
            }
            // Prevents overlay from being hidden
            event.stopPropagation();
        });

        // When previous button is clicked
        $prevButton.click(function(event) {
            // Hide the current image
            $("#overlay img").hide();
            // Overlay image location
            var $currentImgSrc = $("#overlay img").attr("src");
            // Image with matching location of the overlay image
            var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
            // Finds the next image
            var $nextImg = $($currentImg.closest(".image").prev().find("img"));
            // Fade in the next image
            $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
            // Prevents overlay from being hidden
            event.stopPropagation();
        });

        // When the exit button is clicked
        $exitButton.click(function() {
            // Fade out the overlay
            $("#overlay").fadeOut("slow");
        });
    </script>
@endsection
