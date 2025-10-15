@extends('backend.layouts.app')

@section('css_before')
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/select2/css/select2.min.css">
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
@endsection

@section('title-module', $title)

@section('inner')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route($route . '.index') }}">
                        {!! \Lang::choice('tables.classes', 'p') !!}
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0)">
                        {!! $content->isFilled() ? \Lang::choice('tables.edit', 's') : \Lang::choice('tables.new', 's') !!}
                    </a>
                </li>
            </ol>
        </div>
        <!-- ERRORS::FLASH -->
        <div class="row">
            <div class="col-12">
                @include('backend.layouts.alerts')
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {!! $content->isFilled() ? \Lang::choice('tables.edit', 's') : \Lang::choice('tables.new', 's') !!}
                            {!! \Lang::choice('tables.classes', 's') !!}
                        </h4>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST"
                            action="{{ $content->isFilled() ? route($route . '.update', [$content->getId()]) : route($route . '.store') }}">
                            @csrf
                            <div id="accordion-one" class="accordion accordion-primary">
                                <div class="accordion__item">
                                    <div class="accordion__header rounded-lg" data-toggle="collapse"
                                        data-target="#default_collapseOne">
                                        <span class="accordion__header--text">
                                            {!! \Lang::choice('tables.data', 'p') . ' ' . \Lang::choice('tables.basic', 'p') !!}
                                        </span>
                                        <span class="accordion__header--indicator"></span>
                                    </div>
                                    <div id="default_collapseOne" class="collapse accordion__body show"
                                        data-parent="#accordion-one">
                                        <div class="accordion__body--text">
                                            <div class="basic-form pt-5">
                                                <div class="form-row">
                                                    <div class="form-group col-6">
                                                        <label>Nome da Turma</label>
                                                        <input type="text" class="form-control" placeholder="" name="name"
                                                            value="{!! $content->getValue('name') !!}">
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label>Programa</label>
                                                        <select id="select_program"
                                                            class="form-control select2 default-select" name="program_id"
                                                            data-old="">
                                                            @foreach ($programs as $key => $value)
                                                                <option value="{{ $value->getId() }}"
                                                                    {{ $value->getId() === $content->getValue('program_id') ? 'selected' : '' }}>
                                                                    {!! $value->name !!}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row custom-input">
                                                    <div class="form-group col-md-6">
                                                        <label>Periodo</label>
                                                        <select id="select_period"
                                                            class="form-control select2 default-select" name="period"
                                                            data-old="">
                                                            <option value="1"
                                                                {{ 1 === $content->getValue('period') ? 'selected' : '' }}>
                                                                Matutino</option>
                                                            <option value="2"
                                                                {{ 2 === $content->getValue('period') ? 'selected' : '' }}>
                                                                Vespertino</option>
                                                            <option value="3"
                                                                {{ 3 === $content->getValue('period') ? 'selected' : '' }}>
                                                                Noturno</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Polo</label>
                                                        <select id="select_unit" class="form-control select2 default-select"
                                                            name="unit_id" data-old="">
                                                            @foreach ($units as $key => $value)
                                                                <option value="{{ $value->getId() }}"
                                                                    {{ $value->getId() === $content->getValue('unit_id') ? 'selected' : '' }}>
                                                                    {!! $value->name !!}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion__item">
                                    <div class="accordion__header rounded-lg" data-toggle="collapse"
                                        data-target="#default_collapseTwo">
                                        <span class="accordion__header--text">Instrutores</span>
                                        <span class="accordion__header--indicator"></span>
                                    </div>
                                    <div id="default_collapseTwo" class="collapse accordion__body show"
                                        data-parent="#accordion-one">
                                        <div class="accordion__body--text">
                                            <div class="row pt-5">
                                                @foreach ($educators as $key => $value)
                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                        <div class="form-group">
                                                            <div class="form-check mb-2">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        value="{{ $value->getId() }}" name="educators[]"
                                                                        {{ $value->classes()->where('classe_id', $content->getId())->exists()? 'checked': '' }}>{!! $value->name !!}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion__item">
                                    <div class="accordion__header rounded-lg" data-toggle="collapse"
                                        data-target="#default_collapseThree">
                                        <span class="accordion__header--text">Status</span>
                                        <span class="accordion__header--indicator"></span>
                                    </div>
                                    <div id="default_collapseThree" class="collapse accordion__body show"
                                        data-parent="#accordion-one">
                                        <div class="accordion__body--text">
                                            <div class="row pt-5 d-flex justify-content-center">
                                                <div class="form-group col-md-4">
                                                    <select class="form-control select2" name="status" data-old="">
                                                        <option value="1"
                                                            {{ $content->status? 'selected' : '' }}>Ativo
                                                        </option>
                                                        <option value="2"
                                                            {{ !$content->status? 'selected' : '' }}>Inativo
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">{!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script src="{{ asset('public') }}/backend/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('public') }}/js/jquery.mask.js"></script>
    <script src="{{ asset('public') }}/js/mask.js"></script>

    <input type="hidden" name="api-region-countries" value="{{ route('api.region.countries') }}">
    <input type="hidden" name="api-region-states" value="{{ route('api.region.states') }}">
    <input type="hidden" name="api-region-cities" value="{{ route('api.region.cities') }}">
    <input type="hidden" name="api-region-search" value="{{ route('api.region.search') }}">

    <script src="{{ asset('public') }}/backend/js/components/region.init.js"></script>



    <script>
        $(".select2").select2();
        $('#password').prop('disabled', true);
        $("#password").css("cursor", "not-allowed");


        $('#checkpassword').change(function() {
            if ($('#checkpassword').is(':checked') == true) {
                $('#password').prop('disabled', true);
                $("#password").css("cursor", "not-allowed");
                console.log('checked');
            } else {
                $('#password').prop('disabled', false);
                $("#password").css("cursor", "inherit");
                console.log('unchecked');
            }
        });
    </script>

    <script>
        $(".image-product").on("change", function(e) {
            var file = $(this).get(0).files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    // $(".select-image").attr("src", reader.result);
                    $(".select-image").css(
                        "background-image",
                        "url(" + reader.result + ")"
                    );
                    $(".select-image").addClass("visible");
                };
                reader.readAsDataURL(file);
            } else {
                $(".select-image").removeClass("visible");
            }

            // console.log(file);
        });
    </script>
@endsection
