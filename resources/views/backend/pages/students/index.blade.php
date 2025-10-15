@extends('backend.layouts.app')

@section('css_before')
    <!-- Datatable -->
    <link href="{{ asset('public') }}/backend/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/select2/css/select2.min.css">
    <link href="{{ asset('public') }}/backend//vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

    <!-- Daterange picker -->
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{ asset('public') }}/backend/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ asset('public') }}/backend/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link
        href="{{ asset('public') }}/backend/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/pickadate/themes/default.date.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">

@endsection

@section('title-module', $title)

@section('inner')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Listar</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{!! \Lang::choice('tables.students', 'p') !!}</a></li>
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
                        <h4 class="card-title">Listagem de {!! \Lang::choice('tables.students', 'p') !!}</h4>
                        <div>
                            <a href="#" class="btn light btn-success btn-open-search-advanced">
                                Busca Avançada
                            </a>
                            <a href="{{ route($route . '.create') }}" class="btn light btn-secondary">
                                Novo {!! \Lang::choice('tables.students', 's') !!}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="search-advanced"
                            style="{{ request()->type === 'SEARCH-ADVANCED' ? 'display:block' : 'display:none' }}">
                            <div class="card text-white bg-light">
                                <div class="card-header">
                                    <h4 class="card-title ">Busca Avançada</h4>
                                    <a href="#" class="btn btn-warning btn-close-search-advanced">Fechar</a>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="GET" action="{{ route('backend.students.index') }}">
                                            <div class="form-row">
                                                <input type="hidden" name="type" value="SEARCH-ADVANCED">

                                                <div class="form-group col-md-4">
                                                    <label>Nome </label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ request()->name }}" placeholder="Nome">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Idade </label>
                                                    <input type="texzt" class="form-control" name="age"
                                                        value="{{ request()->age }}" placeholder="Idade ">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Sexo </label>
                                                    <select name="sex" class="form-control select2">
                                                        <option {{ request()->unit ? '' : 'selected' }} value="all">
                                                            Todos
                                                        </option>
                                                        @foreach ($sexes as $sex)
                                                            <option value="{{ $sex->getId() }}"
                                                                {{ (int) request()->sex === $sex->getId() ? 'selected' : '' }}>
                                                                {!! $sex->name !!}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Polos </label>
                                                    <select name="unit" class="form-control select-custom select2">
                                                        <option {{ request()->unit ? '' : 'selected' }} value="all">
                                                            Todos
                                                        </option>
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
                                                    <select name="program" class="form-control select-custom select2">
                                                        <option {{ request()->program ? '' : 'selected' }}
                                                            value="all">
                                                            Todos
                                                        </option>
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
                                                    <select name="class" class="form-control select-custom select2">
                                                        <option {{ request()->class ? '' : 'selected' }} value="all">
                                                            Todos
                                                        </option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->getId() }}"
                                                                {{ (int) request()->class === $class->getId() ? 'selected' : '' }}>
                                                                {!! $class->name !!}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>



                                                <div class="form-group col-md-4">
                                                    <label>Status </label>
                                                    <select name="status" class="form-control select-custom select2">
                                                        <option
                                                            {{ (request()->status === 'all' or !request()->status) ? 'selected' : '' }}
                                                            value="all">
                                                            Todos
                                                        </option>
                                                        <option {{ request()->status === 'active' ? 'selected' : '' }}
                                                            value="active">
                                                            Ativo
                                                        </option>
                                                        <option {{ request()->status === 'inactive' ? 'selected' : '' }}
                                                            value="inactive">
                                                            Inativo
                                                        </option>
                                                        <option {{ request()->status === 'transfer' ? 'selected' : '' }}
                                                            value="transfer">
                                                            Transferência
                                                        </option>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Aniversariante </label>
                                                    <select name="birth_date" class="form-control select-custom select2">
                                                        <option
                                                            {{ (request()->birth_date === 'none' or !request()->status) ? 'selected' : '' }}
                                                            value="none">
                                                            Sem/Filtro
                                                        </option>
                                                        <option {{ request()->birth_date === 'now' ? 'selected' : '' }}
                                                            value="now">
                                                            Hoje
                                                        </option>
                                                        <option
                                                            {{ request()->birth_date === 'now_month' ? 'selected' : '' }}
                                                            value="now_month">
                                                            Este Mês
                                                        </option>
                                                        <option
                                                            {{ request()->birth_date === 'custom' ? 'selected' : '' }}
                                                            value="custom">
                                                            Escolher Dia / Mês
                                                        </option>


                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2 birth_date-custom hide_selection"
                                                    style="display: {{ request()->birth_date === 'custom' ? 'block' : 'none' }}">
                                                    <label>Dia </label>
                                                    <select name="birth_date_day"
                                                        class="form-control select-custom select2">
                                                        <option value="all"
                                                            {{ request()->birth_date_day === 'all' ? 'selected' : '' }}>
                                                            Todos
                                                        </option>
                                                        @foreach (range(1, 31) as $key => $day)
                                                            <option value="{{ $key + 1 }}"
                                                                {{ request()->birth_date_day === (string) ($key + 1) ? 'selected' : '' }}>
                                                                {{ $key + 1 }}
                                                            </option>
                                                        @endforeach


                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2 birth_date-custom hide_selection"
                                                    style="display: {{ request()->birth_date === 'custom' ? 'block' : 'none' }}">
                                                    <label>Mes </label>
                                                    <select name="birth_date_month"
                                                        class="form-control select-custom select2">
                                                        <option value="all"
                                                            {{ request()->birth_date_month === 'all' ? 'selected' : '' }}>
                                                            Todos
                                                        </option>
                                                        @foreach (range(1, 12) as $key => $month)
                                                            <option value="{{ $key + 1 }}"
                                                                {{ request()->birth_date_month === (string) ($key + 1) ? 'selected' : '' }}>
                                                                {!! \Functions::getMonthName($key) !!}
                                                            </option>
                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <button onclick="localStorage.clear();" type="submit"
                                                class="btn btn-success">Buscar</button>
                                            <a onclick="localStorage.clear();"
                                                href="{{ route('backend.students.index') }}"
                                                class="btn btn-danger">Resetar</a>
                                            <button type="submit"
                                                formaction="{{ route('backend.students.export', ['excel']) }}"
                                                class="btn btn-dark">Exportar Excel</button>
                                            <button type="button" class="btn btn-dark open-record">Gerar Fichas</button>
                                            <div class="generate-record" style="display: none">
                                                <hr>
                                                <div class="form-group col-12">
                                                    <label>Rodapé do Documento</label>
                                                    <textarea class="form-control" style="color: black; font-size:14pt" rows="4" name="footer" placeholder="Confirmo a atualização ....">Confirmo a atualização dos dados cadastrais desta ficha e estou ciente das anotações de participação do meu filho(a) no Programa.</textarea>
                                                </div>
                                                <button type="submit"
                                                    formaction="{{ route('backend.students.export', ['record']) }}"
                                                    class="btn btn-success ml-3">Gerar Fichas (zip)</button>
                                            </div>
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

            $('.open-record').click(function(e) {
                e.preventDefault();
                let content = $('div.generate-record');
                if (content.css('display') === 'none') {
                    content.css('display', 'block');
                } else {
                    content.css('display', 'none');
                }


            });


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

        $('select[name=birth_date]').change(function(e) {
            $('.hide_selection').css('display', 'none');

            if (this.value === 'custom') {
                $('.birth_date-custom').css('display', 'block');
            }

        });


        $(document).on('click', '.transfer-action', function(e) {
            let select2 = $(document).find('.select2');
            select2.each(function(key, el) {
                $(el).select2();
            });
        })
    </script>

    <script src="{{ asset('public') }}/backend/js/components/birtydate.js"></script>

@endsection
