@extends('backend.layouts.app')

@section('css_before')
    <!-- Datatable -->

    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/summernote/summernote.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


    <style>
        .dropzone.dz-started .dz-message {
            display: block !important;
        }
    </style>
@endsection

@section('title-module', $title)

@section('inner')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">
                        {!! \Lang::choice('tables.abouts', 'p') !!}
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
                        <h4 class="card-title">{!! \Lang::choice('tables.abouts', 's') !!}</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form enctype="multipart/form-data" method="POST"
                                action="{{ route('backend.frontend.abouts.update') }}">
                                @csrf

                                <h6 class="text-dark">Página Inicial</h6>
                                <hr>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Título Pequeno (home)</label>
                                        <input type="text" value="{!! $content->getValue('hat_home') !!}" name="hat_home"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Título (home)</label>
                                        <input type="text" value="{!! $content->getValue('title_home') !!}" name="title_home"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-xl-12 col-xxl-12 pt-3">
                                        <div class="card">
                                            <label class="text-center">Resumo (home)</label>
                                            <div class="card-body mt-n4">
                                                <div class="summernote" data-ref="summary_home">{!! $content->getValue('summary_home') !!}
                                                </div>
                                                <textarea name="summary_home" id="text" style="display: none;" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="text-dark">Página Interna</h6>
                                <hr>

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pb-4">
                                        <label for="image_background">Imagem Capa (Interna Background)</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                        </div>
                                        <label for="image_background"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_background') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_background') ? $content->getImage('originals', 'image_background') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_background') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-image_background" class="image-product"
                                                id="image_background" style="display: none">

                                        </label>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pb-4 mt-4">
                                        <label for="image_featured">Imagem Destaque (Interna)</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                        </div>
                                        <label for="image_featured"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_featured') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_featured') ? $content->getImage('originals', 'image_featured') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_featured') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-image_featured" class="image-product"
                                                id="image_featured" style="display: none">

                                        </label>
                                    </div>
                                </div>
                                <div class="form-row mt-5">
                                    <div class="form-group col-4">
                                        <label>Título Pequeno (interna)</label>
                                        <input type="text" value="{!! $content->getValue('hat_the_institute') !!}" name="hat_the_institute"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-8">
                                        <label>Título (interna)</label>
                                        <input type="text" value="{!! $content->getValue('title_the_institute') !!}" name="title_the_institute"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-xl-12 col-xxl-12 pt-3">
                                        <div class="card">
                                            <label class="text-center">Texto 1</label>
                                            <div class="card-body mt-n4">
                                                <div class="summernote" data-ref="the_institute">{!! $content->getValue('the_institute') !!}
                                                </div>
                                                <textarea name="the_institute" id="text" style="display: none;" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <div class="card">
                                            <label class="text-center">Missão</label>
                                            <div class="card-body mt-n4">
                                                <textarea class="form-control" rows="4" id="about_mission" name="about_mission">{!! $content->getValue('about_mission') !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-4">
                                        <div class="card">
                                            <label class="text-center">Visão</label>
                                            <div class="card-body mt-n4">
                                                <textarea class="form-control" rows="4" id="about_vision" name="about_vision">{!! $content->getValue('about_vision') !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-4">
                                        <div class="card">
                                            <label class="text-center">Valores</label>
                                            <div class="card-body mt-n4">
                                                <textarea class="form-control" rows="4" id="about_values" name="about_values">{!! $content->getValue('about_values') !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mb-4 pb-4">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pb-4">
                                        <label for="about_image_secondary">Imagem Secundaria (Interna)</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 900x500 (pixels)</code>
                                        </div>
                                        <label for="about_image_secondary"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'about_image_secondary') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'about_image_secondary') ? $content->getImage('originals', 'about_image_secondary') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'about_image_secondary') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-about_image_secondary" class="image-product"
                                                id="about_image_secondary" style="display: none">

                                        </label>
                                    </div>
                                </div>


                                <div class="form-group col-md-12 gallery_dropzone hide_selection" style="display: block;">
                                    <div class="dropzone gallery">
                                        <div class="dz-message" data-dz-message><span>Clique aqui para selecionar os
                                                arquivos ou
                                                arraste aqui.</span></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 d-flex flex-column align-items-center justify-content-center ">

                                        <code style="background: #e9fa2b;color: black;padding: 5px;margin-bottom: 5px;">
                                            Obs: As imagens aqui enviadas serão exibidas 2 (duas) por vez no site, não há
                                            limite de quantidade de imagens.
                                        </code>
                                        <code>
                                            Atenção: para enviar mais imagens, basta clicar no box acima aonde voce pode
                                            selecionar as imagens ou arraste para o card.
                                        </code>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Link para Estatuto Social</label>
                                        <input type="text" value="{!! $content->getValue('url_social_status') !!}" name="url_social_status"
                                            class="form-control">
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

@section('js_before')

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

@endsection

@section('js_after')
    <!-- Datatable -->
    <script src="{{ asset('public') }}/backend/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public') }}/backend/js/plugins-init/datatables.init.js"></script>
    <script src="{{ asset('public') }}/backend/vendor/summernote/js/summernote.min.js"></script>
    <script src="{{ asset('public') }}/backend/js/plugins-init/summernote-init.js"></script>

    <script src="{{ asset('public') }}/backend/vendor/sweetalert2/dist/sweetalert2.min.js"></script>


    <script>
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

        $('form').submit(function(event) {

            $('.summernote').each(function(k, el) {
                let ref = $(el).data('ref');
                let text = $(el).summernote('code');
                $('textarea[name=' + ref + ']').val(text);
                console.log(ref);
                console.log(text);
            });
            return true;
        });

        $('select[name=type]').change(function(e) {

            $('.hide_selection').css('display', 'none');

            if (this.value === 'video') {
                $('.embed_video').css('display', 'block');
            }
        });
    </script>


    <script>
        // Dropzone has been added as a global variable.
        Dropzone.autoDiscover = false;
        const dropzone = new Dropzone("div.gallery", {
            // uploadMultiple: true,
            parallelUploads: 10,
            //maxFiles: 10,
            addRemoveLinks: true,
            dictRemoveFile: "Apagar Arquivo",
            url: "{{ route('backend.api.archives.send', ['about_photos', 1]) }}",
            headers: {
                'x-csrf-token': '{{ csrf_token() }}',
            },

            removedfile: function(file) {

                console.log(file);

                swal({
                    title: "Apagar a Arquivo?",
                    text: "Você não poderá recuperar este arquivo!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim, exclua!",
                    cancelButtonText: "Não, cancele!",
                    closeOnConfirm: !1,
                    closeOnCancel: !1,
                }).then((result) => {

                    console.log(result);

                    if ((result.value) && (result.value === true)) {

                        swal("Deleted!", "Seu arquivo foi excluído.", "success");
                        $.ajax({
                            url: '{{ route('backend.api.archives.destroy') }}/' + file.name,
                            type: 'DELETE',
                            sucess: function(data) {
                                console.log('success: ' + data);

                            },
                            headers: {
                                'x-csrf-token': '{{ csrf_token() }}',
                            },
                        });

                        var _ref;
                        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file
                            .previewElement) : void 0;
                    }

                });

                // swal({
                //     title: 'Apagar a Arquivo?',
                //     type: 'warning',
                //     showCancelButton: true,
                //     cancelButtonText: 'Não',
                //     confirmButtonText: 'Sim'
                // }).then((result) => {
                //     $.ajax({
                //         url: '{{ route('backend.api.archives.destroy') }}/' + file.name,
                //         type: 'DELETE',
                //         sucess: function(data) {
                //             console.log('success: ' + data);
                //         },
                //         headers: {
                //             'x-csrf-token': '{{ csrf_token() }}',
                //         },
                //     });
                //     var _ref;
                //     return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file
                //         .previewElement) : void 0;
                // });

            },


            init: function() {
                myDropzone = this;
                $.ajax({
                    url: "{{ route('backend.api.archives.get', ['about_photos', 1]) }}",
                    headers: {
                        'x-csrf-token': '{{ csrf_token() }}',
                    },
                    success: function(response) {

                        $.each(response, function(key, value) {
                            var mockFile = {
                                name: value.id
                            };

                            myDropzone.emit("addedfile", mockFile);
                            myDropzone.emit("thumbnail", mockFile, value.path);
                            myDropzone.emit("complete", mockFile);

                        });

                    }
                });

                myDropzone.on("queuecomplete", function() {});

                myDropzone.on("success", function(file, responseText) {
                    console.log(file);
                    console.log(responseText);

                    let code = responseText.code;

                    if (code === 200) {
                        let data = responseText.data;

                        if (typeof data.entity_id === "undefined") {
                            let content = $('.files_inputs');
                            content.append('<input type="hidden" name="archives_upload[]" value="' +
                                data.id + '" />')
                        }
                    }
                });


            },
        });
    </script>



@endsection
