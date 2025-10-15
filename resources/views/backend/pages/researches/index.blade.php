@extends('backend.layouts.app')

@section('css_before')
    <!-- Datatable -->
    <link href="{{ asset('public') }}/backend/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/select2/css/select2.min.css">
    <link href="{{ asset('public') }}/backend//vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">



@endsection

@section('title-module', $title)

@section('inner')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Listar</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{!! \Lang::choice('tables.researches', 'p') !!}</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">
                @include('backend.layouts.alerts')
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Listagem de {!! \Lang::choice('tables.researches', 'p') !!}</h4>
                        <div>

                            <a href="#" class="btn light btn-warning btn-open-generate-excel">
                                Gerar Relatorio
                            </a>
                            {{-- <a href="{{ route($route . '.create') }}" class="btn light btn-secondary">
                                Novo {!! \Lang::choice('tables.researches', 's') !!}
                            </a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="generate-excel"
                            style="{{ request()->type === 'SEARCH-ADVANCED' ? 'display:block' : 'display:none' }}">
                            <div class="card text-white bg-light">
                                <div class="card-header">
                                    <h4 class="card-title ">Gerar Relatórios</h4>
                                    <a href="#" class="btn btn-warning btn-close-generate-excel">Fechar</a>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="GET" action="{{ route($route . '.index') }}">
                                            <div class="form-row">
                                                <input type="hidden" name="type" value="SEARCH-ADVANCED">



                                                <div class="form-group col-md-4">
                                                    <label>Polos </label>
                                                    <select name="units[]" id="units" class="form-control select2"
                                                        multiple="multiple" required>
                                                        {{-- <option value="all">Todos</option> --}}
                                                        @foreach ($units as $unit)
                                                            <option value="{{ $unit->getId() }}"
                                                                {{ (int) request()->unit === $unit->getId() ? 'selected' : '' }}>
                                                                {!! $unit->name !!}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Programa </label>
                                                    <select name="programs[]" id="programs" class="form-control select2"
                                                        multiple="multiple" required placeholder="Selecione o Polo">
                                                        <option value="all">Todos</option>
                                                        @foreach ($programs as $program)
                                                            <option value="{{ $program->getId() }}"
                                                                {{ (int) request()->program === $program->getId() ? 'selected' : '' }}>
                                                                {!! $program->name !!}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Turmas </label>
                                                    <select name="classes[]" id="classes" class="form-control select2"
                                                        multiple="multiple" required placeholder="Selecione o Polo">

                                                        {{-- @foreach ($classes as $class)
                                                            <option value="{{ $class->getId() }}"
                                                                {{ (int) request()->class === $class->getId() ? 'selected' : '' }}>
                                                                {!! $class->name !!}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Ano de Referência </label>
                                                    <select id="years" class="form-control select2" multiple="multiple"
                                                        name="years[]" required>
                                                        @foreach (range(date('Y'), 1990) as $key => $item)
                                                            <option value={{ $item }}
                                                                {{ $key === 0 && !request()->year ? 'selected' : (request()->year === (string) $item ? 'selected' : '') }}>
                                                                {!! $item !!}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                {{-- <div class="form-group col-md-4">
                                                    <label>Status dos Alunos </label>
                                                    <select id="status" class="form-control select2 " name="status">
                                                        <option value="all">Todos</option>
                                                        <option value="inactive">Inativo</option>
                                                        <option value="active">Ativo</option>
                                                    </select>
                                                </div> --}}

                                            </div>
                                            <hr>
                                            <button type="submit"
                                                formaction="{{ route($route . '.export', ['excel']) }}"
                                                class="btn btn-dark">
                                                Exportar Excel
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="table-index" class="display min-w850">
                                <thead>
                                    <tr>
                                        {!! $columns->table !!}
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
    <script src="{{ asset('public') }}/backend/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('public') }}/js/jquery.mask.js"></script>
    <script src="{{ asset('public') }}/js/mask.js"></script>

    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{ asset('public') }}/backend/vendor/moment/moment.min.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="{{ asset('public') }}/backend/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="{{ asset('public') }}/backend/vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script
        src="{{ asset('public') }}/backend/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
    </script>
    <!-- pickdate -->
    <script src="{{ asset('public') }}/backend/vendor/pickadate/picker.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/pickadate/picker.time.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/pickadate/picker.date.js"></script>

    <input type="hidden" name="api-req-programs" value="{{ route('backend.researches.api', 'programs') }}">
    <input type="hidden" name="api-req-classes" value="{{ route('backend.researches.api', 'classes') }}">


    <script type="text/javascript">
        function selectRefresh($item = null) {
            if ($item) {
                $($item).select2();
            } else {
                $(".select2").select2();
            }
        }

        selectRefresh();

        $(document).ready(function(e) {


            $('.btn-open-search-advanced').click(function(e) {
                e.preventDefault();
                $('.search-advanced').show();
                selectRefresh();
            });
            $('.btn-close-search-advanced').click(function(e) {
                e.preventDefault();
                $('.search-advanced').hide();
                selectRefresh();
            });

            $('.btn-open-generate-excel').click(function(e) {
                e.preventDefault();
                $('.generate-excel').show();
                selectRefresh();
            });
            $('.btn-close-generate-excel').click(function(e) {
                e.preventDefault();
                $('.generate-excel').hide();
                selectRefresh();
            });

        })
        $(function() {

            function getUrlVars() {
                var vars = [],
                    hash;
                var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                for (var i = 0; i < hashes.length; i++) {
                    hash = hashes[i].split('=');
                    vars.push(hash[0]);
                    vars[hash[0]] = hash[1];
                }
                return vars;
            }


            var table = $('#table-index').DataTable({
                stateSave: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route($route . '.index') }}",
                    data: getUrlVars(),
                },
                order: [
                    [0, 'desc']
                ],
                columns: {!! $columns->js !!},
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                },
            });
        });
    </script>

    <script src="{{ asset('public') }}/backend/js/components/birtydate.js"></script>


    <script src="{{ asset('public') }}/backend/js/components/researches.init.js"></script>

@endsection
