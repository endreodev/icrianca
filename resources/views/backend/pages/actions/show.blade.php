@extends('backend.layouts.app')

@section('css_before')
    <!-- Datatable -->

    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/summernote/summernote.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />



@endsection


@section('title-module', $title)

@section('inner')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route($route . '.index') }}">
                        {!! \Lang::choice('tables.actions', 'p') !!}
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
                        <h4 class="card-title">{!! $content->isFilled() ? \Lang::choice('tables.edit', 's') : \Lang::choice('tables.new-a', 's') !!} {!! \Lang::choice('tables.actions', 's') !!}</h4>
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
                                                <label>Categoria</label>
                                                <select id="type" name="type" class="form-control default-select">
                                                    <option value="news"
                                                        {{ $content->getValue('type') === 'news' ? 'selected' : '' }}>
                                                        Notícias
                                                    </option>
                                                    <option value="photos"
                                                        {{ $content->getValue('type') === 'photos' ? 'selected' : '' }}>
                                                        Fotos
                                                    </option>
                                                    <option value="video"
                                                        {{ $content->getValue('type') === 'video' ? 'selected' : '' }}>
                                                        Vídeos
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Título</label>
                                                <input type="text" value="{!! $content->getValue('title') !!}" name="title"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group col-md-12 embed_video hide_selection"
                                                style="display: {{ $content->getValue('type') === 'video' ? 'block' : 'none' }};">
                                                <label>Link/Código Vídeo Youtube</label>
                                                <input type="text" value="{!! $content->getValue('embed_video') !!}" name="embed_video"
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


                                    <div class="form-group col-md-12 gallery_dropzone" style="display: block;">
                                        <div class="dropzone gallery">
                                            <div class="dz-message" data-dz-message><span>Selecione os arquivos ou
                                                    arraste aqui.</span></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Status</label>
                                        <select id="inputStatus" name="status" class="form-control default-select">
                                            <option value="1" {{ $content->getValue('status') ? 'selected' : '' }}>Ativo
                                            </option>
                                            <option value="0" {{ !$content->getValue('status') ? 'selected' : '' }}>
                                                Inativo
                                            </option>
                                        </select>
                                    </div>
                                    <div class="files_inputs">

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
            parallelUploads: 1,
            //maxFiles: 10,
            addRemoveLinks: true,
            dictRemoveFile: "Apagar Arquivo",
            url: "{{ route('backend.api.archives.send', [($content->isFilled() ? $content->getValue('type') : 'photos'), $content->isFilled() ? $content->getId() : 'created']) }}",
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

            },


            init: function() {
                myDropzone = this;
                $.ajax({
                    url: '{{ route('backend.api.archives.get', [$content->getId() ? $content->getValue('type') : 'photos', $content->isFilled() ? $content->getId() : 'created']) }}',
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
