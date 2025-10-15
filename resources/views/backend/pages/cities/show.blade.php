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
                        {!! \Lang::choice('tables.cities', 'p') !!}
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
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{!! $content->isFilled() ? \Lang::choice('tables.edit', 's') : \Lang::choice('tables.new', 's') !!} {!! \Lang::choice('tables.cities', 's') !!}</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form enctype="multipart/form-data" method="POST"
                                action="{{ $content->isFilled() ? route($route . '.update', [$content->getId()]) : route($route . '.store') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label>Nome</label>
                                        <input type="text" name="name" value="{!! $content->getValue('name') !!}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>País</label>
                                        <select id="select_countries" class="form-control select2 " name="country_id"
                                            data-old="{!! $content->getValue('country') !!}">
                                            <option selected>Carregando...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Estado</label>
                                        <select id="select_states" class="form-control select2 " name="state_id"
                                            data-old="{!! $content->getValue('state_id') !!}">
                                            <option selected>Escolha o Pais</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Status</label>
                                        <select id="inputStatus" name="status" class="form-control ">
                                            <option value="1" {{ $content->getValue('status') ? 'selected' : '' }}>Ativo
                                            </option>
                                            <option value="0" {{ !$content->getValue('status') ? 'selected' : '' }}>
                                                Inativo</option>
                                        </select>
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
    </div>
@endsection

@section('js_after')
    <!-- Datatable -->
    <script src="{{ asset('public') }}/backend/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public') }}/js/jquery.mask.js"></script>
    <script src="{{ asset('public') }}/js/mask.js"></script>
    <script src="{{ asset('public') }}/backend/js/plugins-init/datatables.init.js"></script>

    <input type="hidden" name="api-region-countries" value="{{ route('api.region.countries') }}">
    <input type="hidden" name="api-region-states" value="{{ route('api.region.states') }}">
    <input type="hidden" name="api-region-cities" value="{{ route('api.region.cities') }}">
    <input type="hidden" name="api-region-search" value="{{ route('api.region.search') }}">

    <script src="{{ asset('public') }}/backend/js/components/region.cities.js"></script>


    <script type="text/javascript">
        $(".select2").select2();
    </script>


@endsection
