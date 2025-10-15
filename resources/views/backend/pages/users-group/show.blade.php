@extends('backend.layouts.app')

@section('css_before')
    <!-- Datatable -->
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('inner')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('backend.group.users.index') }}">
                        {!! \Lang::choice('tables.users-group', 'p') !!}
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
                        <h4 class="card-title">
                            {!! $content->isFilled() ? \Lang::choice('tables.edit', 's') : \Lang::choice('tables.new', 's') !!} {!! \Lang::choice('tables.users-group', 's') !!}
                        </h4>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST"
                            action="{{ $content->isFilled() ? route($route . '.update', [$content->getId()]) : route($route . '.store') }}">
                            @csrf
                            <div class="form-group col-md-12">
                                <label>Nome</label>
                                <input type="text" value="{!! $content->getValue('name') !!}" name="name" class="form-control"
                                    disabled readonly>
                            </div>
                            <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseTwo">
                                    <span class="accordion__header--text">
                                        Permissões do Grupo
                                    </span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="default_collapseTwo" class="collapse accordion__body show"
                                    data-parent="#accordion-one">
                                    <div class="accordion__body--text">

                                        <div class="row pt-5">
                                            @foreach ($permissions as $key => $value)
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="{{ $value->name }}" value="{{ $value->name }}"
                                                                name="permissions[]"
                                                                {{ $content->hasPermissionTo($value->name) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="{{ $value->name }}">
                                                                {!! \Functions::getNamePermissions($value->name) !!}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">
                                Cadastrar Grupo
                            </button>
                        </form>
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
