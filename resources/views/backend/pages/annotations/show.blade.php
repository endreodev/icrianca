@extends('backend.layouts.app')

@section('css_before')
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/select2/css/select2.min.css">
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/summernote/summernote.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">



@endsection


@section('title-module', $title)

@section('inner')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route($route . '.index') }}">
                        {!! \Lang::choice('tables.annotations', 'p') !!}
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
                        <h4 class="card-title">{!! $content->isFilled() ? \Lang::choice('tables.edit', 's') : \Lang::choice('tables.new-a', 's') !!} {!! \Lang::choice('tables.annotations', 's') !!}</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form enctype="multipart/form-data" method="POST"
                                action="{{ $content->isFilled() ? route($route . '.update', [$content->getId()]) : route($route . '.store') }}">
                                @csrf

                                <div class="form-row">

                                    <div class="col-md-12">



                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Tipo de Envio</label>
                                                <select id="type" name="type" class="form-control default-select" required>
                                                    <option selected disabled>
                                                        Selecione o tipo
                                                    </option>
                                                    <option value="student"
                                                        {{ $content->getValue('type') === 'student' ? 'selected' : '' }}>
                                                        Alunos
                                                    </option>
                                                    <option value="units"
                                                        {{ $content->getValue('type') === 'units' ? 'selected' : '' }}>
                                                        Polos
                                                    </option>
                                                    <option value="classes"
                                                        {{ $content->getValue('type') === 'classes' ? 'selected' : '' }}>
                                                        Turmas
                                                    </option>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 student_content hide_selection"
                                                style="display: none;">
                                                <label>Alunos</label>
                                                <select id="student" name="student[]" class="select2" multiple="multiple">
                                                    @foreach ($students as $student)
                                                        <option value="{{ $student->getId() }}">
                                                            {!! $student->name !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 units_content hide_selection"
                                                style="display: none;">
                                                <label>Polos</label>
                                                <select id="units" name="units[]" class="form-control select2"
                                                    multiple="multiple">

                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->getId() }}">
                                                            {!! $unit->name !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 classes_content hide_selection"
                                                style="display: none;">
                                                <label>Turmas</label>
                                                <select id="classes" name="classes[]" class="form-control select2"
                                                    multiple="multiple">

                                                    @foreach ($classes as $classe)
                                                        <option value="{{ $classe->getId() }}">
                                                            {!! $classe->name !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Data</label>
                                                <input type="date" value="{!! $content->getValue('date') !!}" name="date"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Título</label>
                                                <input type="text" value="{!! $content->getValue('title') !!}" name="title"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-xl-12 col-xxl-12 pt-3">
                                        <div class="card">
                                            <label class="text-center">Texto</label>
                                            <div class="card-body mt-n4">
                                                <div class="summernote">{!! $content->getValue('text') !!}</div>
                                                <textarea name="text" id="text" style="display: none;" cols="30" rows="10"></textarea>
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
    </div>
@endsection



@section('js_after')
    <script src="{{ asset('public') }}/backend/vendor/summernote/js/summernote.min.js"></script>
    <script src="{{ asset('public') }}/backend/js/plugins-init/summernote-init.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/sweetalert2/dist/sweetalert2.min.js"></script>

    <script type="text/javascript">
        function selectRefresh($item = null) {
            if ($item) {
                $($item).select2();
            } else {
                $(".select2").select2();
            }
        }
        $('form').submit(function(event) {
            var messageData = $('.summernote').summernote('code');
            $('textarea[name=text]').val(messageData);
            return true;
        });

        $('select[name=type]').change(function(e) {
            $('.hide_selection').css('display', 'none');
            $('.hide_selection').find('select').prop('required', false);
            $('.' + this.value + '_content').css('display', 'block');
            $('.' + this.value + '_content').find('select').prop('required', true);
        });

        selectRefresh();
    </script>





@endsection
