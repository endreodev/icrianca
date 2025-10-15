@extends('backend.layouts.app')

@section('css_before')
<!-- Datatable -->

<link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="{{ asset('public') }}/backend/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('title-module', $title)

@section('inner')
<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item">
                <a href="{{ route($route . '.index') }}">
                    {!!\Lang::choice('tables.countries', 'p')!!}
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
                    <h4 class="card-title">{!! $content->isFilled() ? \Lang::choice('tables.edit', 's') : \Lang::choice('tables.new', 's') !!} {!!\Lang::choice('tables.countries', 's')!!}</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form enctype="multipart/form-data" method="POST"
                            action="{{ $content->isFilled() ? route($route . '.update', [$content->getId()]) : route($route . '.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <label>Nome</label>
                                    <input type="text" name="name" value="{!! $content->getValue('name') !!}" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Sigla</label>
                                    <input type="text" name="initials" value="{!! $content->getValue('initials') !!}" class="form-control">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Status</label>
                                    <select id="inputStatus" name="status" class="form-control default-select">
                                        <option value="1" {{($content->getValue('status')) ? 'selected' : ''}}>Ativo</option>
                                        <option value="0" {{(!$content->getValue('status')) ? 'selected' : ''}}>Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">
                                {!!($content->isFilled() ? \Lang::choice("tables.save", "s") : \Lang::choice("tables.new", "s"))!!}
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
<script src="{{ asset('public') }}/backend/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('public') }}/backend/js/plugins-init/datatables.init.js"></script>
@endsection