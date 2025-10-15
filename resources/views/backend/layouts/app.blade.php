@extends('backend.layouts.default')



@section('content')
    <!--*******************
                Preloader start
            ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
                    Preloader end
                ********************-->


    <div id="main-wrapper">

        @include('backend.layouts.nav-header')

        @include('backend.layouts.header')

        @include('backend.layouts.sidebar')

        <div class="content-body">
            @yield('inner')
        </div>


        <!--**********************************
                    Footer start
                ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Powered by <a href="//codeall.app" target="_blank">CodeAll</a> ©; Desenvolvido  por 
                    <a href="http://harmonysistemas.com.br/" target="_blank"> Harmony Sistemas</a>
                </p>
            </div>
        </div>
        <!--**********************************
                    Footer end
                ***********************************-->

    </div>
@endsection
