@extends('backend.layouts.app')

@section('css_before')
    <!-- Datatable -->

    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/summernote/summernote.css" rel="stylesheet">
@endsection


@section('title-module', $title)

@section('inner')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route($route . '.index') }}">
                        {!! \Lang::choice('tables.reports', 'p') !!}
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
                        <h4 class="card-title">{!! $content->isFilled() ? \Lang::choice('tables.edit', 's') : \Lang::choice('tables.new', 's') !!} {!! \Lang::choice('tables.reports', 's') !!}</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form enctype="multipart/form-data" method="POST"
                                action="{{ $content->isFilled() ? route($route . '.update', [$content->getId()]) : route($route . '.store') }}">
                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 500x500 (pixels)</code>
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
                                    <div class="col-md-8">

                                        <div class="row">

                                            <div class="form-group col-md-12">
                                                <label>Título</label>
                                                <input type="text" value="{!! $content->getValue('title') !!}" name="title"
                                                    class="form-control">
                                            </div>

                                            @if ($content->getFile())
                                                <div class="form-group col-12">
                                                    <div class="btn-group col-12 row">

                                                        <a href="{{$content->getFile()}}" target="_blank" class="btn btn-dark ">
                                                            <i class="fa fa-file mr-2"></i>
                                                            Ver arquivo atual
                                                        </a>
                                                        <a href="{{route($route . '.trash-file', $content->getId())}}" class="btn btn-danger">
                                                            <i class="fa fa-trash mr-2"></i>
                                                            Apagar
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-group col-12">
                                                Enviar novo arquivo
                                            </div>
                                            <div class="form-group col-md-12 input-group mb-3">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Arquivo</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="file-archive" accept=".pdf" class="custom-file-input">
                                                    <label class="custom-file-label">Selecionar</label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>



                                <div class="form-group col-md-12 mt-4">
                                    <label>Status</label>
                                    <select name="status" class="form-control default-select">
                                        <option value="1" {{ $content->getValue('status') ? 'selected' : '' }}>Ativo
                                        </option>
                                        <option value="0" {{ !$content->getValue('status') ? 'selected' : '' }}>Inativo
                                        </option>
                                    </select>
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
    <script src="{{ asset('public') }}/backend/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public') }}/backend/js/plugins-init/datatables.init.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/summernote/js/summernote.min.js"></script>
    <script src="{{ asset('public') }}/backend/js/plugins-init/summernote-init.js"></script>

    <script type="text/javascript">
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

        $('form').submit(function(event) {
            var messageData = $('.summernote').summernote('code');
            $('textarea[name=text]').val(messageData);
            return true;
        });
    </script>
@endsection
