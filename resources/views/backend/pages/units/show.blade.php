@extends('backend.layouts.app')

@section('css_before')
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/select2/css/select2.min.css">
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/summernote/summernote.css" rel="stylesheet">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
@endsection

@section('title-module', $title)

@section('inner')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route($route . '.index') }}">
                        {!! \Lang::choice('tables.units', 'p') !!}
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
                            {!! \Lang::choice('tables.units', 's') !!}
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
                                        <span class="accordion__header--text">Dados Básicos</span>
                                        <span class="accordion__header--indicator"></span>
                                    </div>
                                    <div id="default_collapseOne" class="collapse accordion__body show"
                                        data-parent="#accordion-one">
                                        <div class="accordion__body--text">
                                            <div class="basic-form pt-5">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                                        </div>
                                                        <label for="file"
                                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage() ? 'visible' : '' }}"
                                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage() ? $content->getImage() : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                                            <span class="d-flex align-self-center" style="top: 10%">
                                                                {{ isset($content) && $content->isFilled() && $content->getImage() ? 'Alterar' : 'Selecionar' }}
                                                                Imagem
                                                            </span>
                                                            <input type="file" name="file" class="image-product" id="file"
                                                                style="display: none">

                                                        </label>

                                                    </div>
                                                    
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pt-3">
                                                        <div class="form-group col-12 text-center">
                                                            <label>Nome do Polo</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="name" value="{!! $content->getValue('name') !!}">
                                                        </div>
                                                        <div class="form-group col-12 text-center">
                                                            <label>Local</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="locate" value="{!! $content->getValue('locate') !!}">
                                                        </div>
                                                        <div class="form-group col-xl-12 col-xxl-12 pt-3">
                                                            <div class="card">
                                                                <label class="text-center">Descrição</label>
                                                                <div class="card-body mt-n4">
                                                                    <div class="summernote">{!! $content->getValue('description') !!}
                                                                    </div>
                                                                    <textarea name="description" id="description" style="display: none;" cols="30" rows="10"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion__item">
                                    <div class="accordion__header rounded-lg" data-toggle="collapse"
                                        data-target="#default_collapseTwo">
                                        <span class="accordion__header--text">Endereço do Polo</span>
                                        <span class="accordion__header--indicator"></span>
                                    </div>

                                    <div id="default_collapseTwo" class="collapse accordion__body show"
                                        data-parent="#accordion-one">
                                        <div class="accordion__body--text">
                                            <div class="form-row custom-input pt-5">
                                                <div class="form-group col-12">
                                                    <div id="map"></div>
                                                </div>
                                                <div>
                                                    <input type="hidden" name="lat" id="lat">
                                                    <input type="hidden" name="lng" id="lng">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>CEP</label>
                                                    <input type="text" id="zipcode" class="form-control cep_with_callback"
                                                        name="zipcode" value="{!! $content->getValue('zipcode') !!}"
                                                        data-old="{!! $content->getValue('zipcode') !!}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Rua</label>
                                                    <input type="text" id="address" class="form-control" name="address"
                                                        value="{!! $content->getValue('address') !!}" data-old="{!! $content->getValue('address') !!}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Número</label>
                                                    <input type="text" id="number" class="form-control" name="number"
                                                        value="{!! $content->getValue('number') !!}"
                                                        data-old="{!! $content->getValue('number') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Bairro</label>
                                                    <input type="text" id="district" class="form-control" name="district"
                                                        value="{!! $content->getValue('district') !!}"
                                                        data-old="{!! $content->getValue('district') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>País</label>
                                                    <select id="select_countries"
                                                        class="form-control select2 default-select" name="country_id"
                                                        data-old="{!! $content->getValue('country_id') !!}">
                                                        <option selected>Carregando...</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Estado</label>
                                                    <select id="select_states" class="form-control select2 default-select"
                                                        name="state_id" data-old="{!! $content->getValue('state_id') !!}">
                                                        <option selected>Escolha o Pais</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Cidade</label>
                                                    <select id="select_cities" class="form-control select2 default-select"
                                                        name="city_id" data-old="{!! $content->getValue('city_id') !!}">
                                                        <option selected>Escolha o Estado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion__item">
                                    <div class="accordion__header rounded-lg" data-toggle="collapse"
                                        data-target="#default_collapseThree">
                                        <span class="accordion__header--text">Programas</span>
                                        <span class="accordion__header--indicator"></span>
                                    </div>
                                    <div id="default_collapseThree" class="collapse accordion__body show"
                                        data-parent="#accordion-one">
                                        <div class="accordion__body--text">
                                            <div class="row pt-5">
                                                <div class="col-md-12">
                                                    <div class="form-group text-center">
                                                        @foreach ($programs as $item)
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="program_id[]"
                                                                        class="form-check-input"
                                                                        {{ $content->isFilled()? ($content->programs()->where('program_id', $item->getId())->exists()? 'checked': ''): '' }}
                                                                        value="{{ $item->getId() }}">{!! $item->name !!}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion__item">
                                    <div class="accordion__header rounded-lg" data-toggle="collapse"
                                        data-target="#default_collapseFour">
                                        <span class="accordion__header--text">Visibilidade e Permissões</span>
                                        <span class="accordion__header--indicator"></span>
                                    </div>
                                    <div id="default_collapseFour" class="collapse accordion__body show"
                                        data-parent="#accordion-one">
                                        <div class="accordion__body--text">
                                            <div class="row pt-5 text-center">
                                                <div class="col-md-6">
                                                    <label>Status</label>
                                                    <div class="form-group mb-0">
                                                        <label class="radio-inline mr-3">
                                                            <input type="radio" name="status-radio" value="1"
                                                                {{ $content->getValue('status') ? 'checked' : '' }}>
                                                            Ativo</label>
                                                        <label class="radio-inline mr-3">
                                                            <input type="radio" name="status-radio" value="0"
                                                                {{ !$content->getValue('status') ? 'checked' : '' }}>
                                                            Inativo</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Exibir no Site?</label>
                                                    <div class="form-group mb-0">
                                                        <label class="radio-inline mr-3">
                                                            <input type="radio" name="is_visible-radio" value="1"
                                                                {{ $content->getValue('is_visible') ? 'checked' : '' }}>
                                                            Exibir
                                                        </label>
                                                        <label class="radio-inline mr-3">
                                                            <input type="radio" name="is_visible-radio" value="0"
                                                                {{ !$content->getValue('is_visible') ? 'checked' : '' }}>
                                                            Não Exibir
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">
                                {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
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
    <script src="{{ asset('public') }}/backend/vendor/summernote/js/summernote.min.js"></script>
    <script src="{{ asset('public') }}/backend/js/plugins-init/summernote-init.js"></script>


    <input type="hidden" name="api-region-countries" value="{{ route('api.region.countries') }}">
    <input type="hidden" name="api-region-states" value="{{ route('api.region.states') }}">
    <input type="hidden" name="api-region-cities" value="{{ route('api.region.cities') }}">
    <input type="hidden" name="api-region-search" value="{{ route('api.region.search') }}">

    <script>
        const _LAT = "{{ $content->getValue('lat') }}";
        const _LNG = "{{ $content->getValue('lng') }}";
    </script>


    {{-- <script src="{{ asset('public') }}/backend/js/components/mapbox.init.js"></script> --}}
    <script src="{{ asset('public') }}/backend/js/components/region.units.js"></script>


    <script>
        $('form').submit(function(event) {
            var messageData = $('.summernote').summernote('code');
            $('textarea[name=description]').val(messageData);
            return true;
        });


        $(".select2").select2();
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
        });
    </script>
    @if ($content->isFilled())
        <script type="text/javascript">
            $(document).ready(function(e) {
                $('#zipcode').trigger('focus');
            });
        </script>
    @endif
@endsection
