@extends('backend.layouts.app')

@section('css_before')
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/select2/css/select2.min.css">
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
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
                        {!! \Lang::choice('tables.action-lines', 'p') !!}
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
                            {!! \Lang::choice('tables.action-lines', 's') !!}
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

                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pb-4">
                                                        <label for="image">
                                                            Logo/Icone
                                                        </label>
                                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                                            <code>Dimensão da Imagem: 500x500 (pixels)</code>
                                                        </div>
                                                        <label for="image"
                                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image') ? 'visible' : '' }}"
                                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image') ? $content->getImage('originals', 'image') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                                            <span class="d-flex align-self-center" style="top: 10%">
                                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image') ? 'Alterar' : 'Selecionar' }}
                                                                Imagem
                                                            </span>
                                                            <input type="file" name="file-image" class="image-product"
                                                                id="image" style="display: none">

                                                        </label>
                                                    </div>




                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pt-3">
                                                        <div class="form-group col-12 text-center">
                                                            <label>Nome</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="title" value="{!! $content->getValue('title') !!}">
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
                                                <div class="form-group col-md-12">
                                                    <label>Status</label>
                                                    <select id="inputStatus" name="status" class="form-control default-select">
                                                        <option value="1" {{($content->getValue('status')) ? 'selected' : ''}}>Ativo
                                                        </option>
                                                        <option value="0" {{(!$content->getValue('status')) ? 'selected' : ''}}>Inativo
                                                        </option>
                                                    </select>
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

    <script src="{{ asset('public') }}/backend/vendor/summernote/js/summernote.min.js"></script>
    <script src="{{ asset('public') }}/backend/js/plugins-init/summernote-init.js"></script>



    <script>
        $('form').submit(function(event) {
            var messageData = $('.summernote').summernote('code');
            $('textarea[name=description]').val(messageData);
            return true;
        });

        $(".image-product").on("change", function(e) {
            var file = $(this).get(0).files[0];
            let content = $('label[for^=' + $(this).attr('id') + '].select-image');

            console.log(content);

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    // $(".select-image").attr("src", reader.result);

                    $(content).css(
                        "background-image",
                        "url(" + reader.result + ")"
                    );
                    $(content).addClass("visible");
                };
                reader.readAsDataURL(file);
            } else {
                $(content).removeClass("visible");
            }
        });
    </script>

@endsection
