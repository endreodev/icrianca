@extends('backend.layouts.app')


@section('css_before')
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/chartist/css/chartist.min.css">
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
@endsection

@section('title-module', 'Dashboard')

@section('inner')



    <!-- row -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                @include('backend.layouts.alerts')
            </div>
        </div>

        <div class="row">

            <div class="col-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-warning  mr-md-4 mr-3">
                                <i class="flaticon-381-help" style="font-size:24px; color:#ffbc11;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Programas</p>
                                <span class="title text-black font-w600">{!! $programs !!}</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-warning" style="width: 100%; height:5px;" role="progressbar">
                                <span class="sr-only">42% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-warning"></div>
                </div>
            </div>

            <div class="col-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-danger mr-md-4 mr-3">
                                <i class="flaticon-381-home-2" style="font-size:24px; color:#f94687;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Polos</p>
                                <span class="title text-black font-w600">{!! $units !!}</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-danger" style="width: 100%; height:5px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-danger"></div>
                </div>
            </div>

            <div class="col-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                                <i class="flaticon-381-user-9" style="font-size:24px; color:#a02cfa;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Turmas</p>
                                <span class="title text-black font-w600">{!! $classes !!}</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-secondary" style="width: 100%; height:5px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-secondary"></div>
                </div>
            </div>


            <div class="col-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-success mr-md-4 mr-3">
                                <i class="flaticon-381-user-8" style="font-size:24px; color:#2bc155;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Alunos Ativos</p>
                                <span class="title text-black font-w600">{!! $students !!}</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-success" style="width: 100%; height:5px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-success"></div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-sm-flex d-block pb-0 border-0">
                        <div class="mr-auto pr-3 mb-sm-0 mb-3">
                            <h4 class="text-black fs-20">Novos Alunos</h4>
                            <p class="fs-13 mb-0 text-black">Gráfico de linha mês a mês</p>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <div id="chartBar"></div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Alunos por Sexo</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="pie_chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Alunos Ativo por Idade</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart_1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card featuredMenu">
                    <div class="card-header border-0">
                        <h4 class="text-black font-w600 fs-20 mb-0">Últimos Cadastros</h4>
                    </div>
                    <div class="card-body loadmore-content height750 dz-scroll pt-0" id="FeaturedMenusContent">
                        @foreach ($students_lasted as $item)
                            <div class="last-students">
                                <div class="media mb-4">
                                    {{-- <img src="https://i.picsum.photos/id/2/200/300.jpg" width="85" alt=""
                                class="rounded mr-3"> --}}
                                    <div class="media-body">
                                        <h5>
                                            <a href="{{ route('backend.students.show', $item->getId()) }}"
                                                class="text-black fs-16">
                                                {!! $item->name !!}
                                            </a>
                                        </h5>
                                        <span class="fs-14 text-primary font-w500">{!! $item->age !!} anos</span>
                                    </div>
                                </div>
                                {{-- <ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
                            <li class="mr-3 mb-2">
                                <i class="las la-map scale5 mr-3"></i>
                                <span class="fs-14 text-black">Escola Estadual Ana Tereza</span>
                            </li>
                        </ul> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection


@section('js_after')

    <input type="hidden" name="api-dashboard-event" value="{{ route('api.dashboard', 'students') }}">
    <input type="hidden" name="api-dashboard-event-sex" value="{{ route('api.dashboard', 'sex') }}">
    <input type="hidden" name="api-dashboard-event-age" value="{{ route('api.dashboard', 'age') }}">
    <input type="hidden" name="api-csrf_token" value="{!! csrf_token() !!}">
    {{-- <script src="{{ asset('public') }}/backend/vendor/owl-carousel/owl.carousel.js"></script> --}}
    <!-- Chart piety plugin files -->
    <!-- Apex Chart -->
    <script src="{{ asset('public') }}/backend/vendor/peity/jquery.peity.min.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/apexchart/apexchart.js"></script>
    
    <!-- Dashboard 1 -->
    <script src="{{ asset('public') }}/backend/js/components/charts.dashboard.js"></script>
    {{-- <script src="{{ asset('public') }}/backend/js/dashboard/dashboard-1.js"></script> --}}
    {{-- <script src="{{ asset('public') }}/backend/js/plugins-init/chartjs-init.js"></script> --}}
@endsection
