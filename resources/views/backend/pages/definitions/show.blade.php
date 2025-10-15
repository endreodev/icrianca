@extends('backend.layouts.app')

@section('css_before')
    <!-- Datatable -->

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
                    <a href="javascript:void(0)">
                        {!! \Lang::choice('tables.definitions', 'p') !!}
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
                        <h4 class="card-title">{!! \Lang::choice('tables.definitions', 's') !!}</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form enctype="multipart/form-data" method="POST"
                                action="{{ route('backend.frontend.definitions.update') }}">
                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Endereço</label>
                                        <input type="text" value="{!! $content->getValue('address') !!}" name="address"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Telefone</label>
                                        <input type="text" value="{!! $content->getValue('phone') !!}" name="phone"
                                            class="form-control sp_celphones">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>E-mail (Visivel no Site)</label>
                                        <input type="text" value="{!! $content->getValue('email_site') !!}" name="email_site"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>E-mail (Receberá o formulário de Contato)</label>
                                        <input type="text" value="{!! $content->getValue('email_form_contact') !!}" name="email_form_contact"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>E-mail (Receberá o formulário de Como Apoiar?)</label>
                                        <input type="text" value="{!! $content->getValue('email_form_helped_institute') !!}"
                                            name="email_form_helped_institute" class="form-control">
                                    </div>
                                </div>

                                <hr style="margin: 40px 0 10px;">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pb-4">
                                        <label for="bg_programs">Imagem Capa (Página > <a href="{{route('frontend.programs')}}" target="_blank">Programas</a>)</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                        </div>
                                        <label for="bg_programs"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_programs') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_programs') ? $content->getImage('originals', 'bg_programs') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_programs') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-bg_programs" class="image-product"
                                                id="bg_programs" style="display: none">

                                        </label>
                                    </div>
                                </div>
                                <hr style="margin: 60px 0 10px;">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pb-4">
                                        <label for="bg_actions_line">Imagem Capa (Página > <a href="{{route('frontend.action-lines')}}" target="_blank">Linhas de Ações</a>)</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                        </div>
                                        <label for="bg_actions_line"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_actions_line') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_actions_line') ? $content->getImage('originals', 'bg_actions_line') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_actions_line') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-bg_actions_line" class="image-product"
                                                id="bg_actions_line" style="display: none">

                                        </label>
                                    </div>
                                </div>
                                <hr style="margin: 60px 0 10px;">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pb-4 mt-4">
                                        <label for="bg_actions">Imagem Capa (Página > <a href="{{route('frontend.actions')}}" target="_blank">Ações</a>)</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                        </div>
                                        <label for="bg_actions"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_actions') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_actions') ? $content->getImage('originals', 'bg_actions') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_actions') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-bg_actions" class="image-product"
                                                id="bg_actions" style="display: none">

                                        </label>
                                    </div>
                                </div>
                                <hr style="margin: 60px 0 10px;">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pb-4 mt-4">
                                        <label for="bg_units">Imagem Capa (Página > <a href="{{route('frontend.units')}}" target="_blank">Polos</a>)</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                        </div>
                                        <label for="bg_units"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_units') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_units') ? $content->getImage('originals', 'bg_units') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_units') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-bg_units" class="image-product"
                                                id="bg_units" style="display: none">

                                        </label>
                                    </div>
                                </div>
                                <hr style="margin: 60px 0 10px;">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pb-4 mt-4">
                                        <label for="bg_partners">Imagem Capa (Página > <a href="{{route('frontend.partners')}}" target="_blank">Parceiros</a>)</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                        </div>
                                        <label for="bg_partners"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_partners') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_partners') ? $content->getImage('originals', 'bg_partners') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_partners') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-bg_partners" class="image-product"
                                                id="bg_partners" style="display: none">

                                        </label>
                                    </div>

                                    <div class="form-group col-6 pb-4 mt-5 pt-3">
                                        <label for="image_1_partner">Imagem 1 Parceiro (Página > <a href="{{route('frontend.partners')}}" target="_blank">Parceiros</a>)</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                        </div>
                                        <label for="image_1_partner"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_1_partner') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_1_partner') ? $content->getImage('originals', 'image_1_partner') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_1_partner') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-image_1_partner" class="image-product"
                                                id="image_1_partner" style="display: none">

                                        </label>
                                    </div>
                                    <div class="form-group col-6 pb-4 mt-5 pt-3">
                                        <label for="image_2_partner">Imagem 2 Parceiro (Página > <a href="{{route('frontend.partners')}}" target="_blank">Parceiros</a>)</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                        </div>
                                        <label for="image_2_partner"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_2_partner') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_2_partner') ? $content->getImage('originals', 'image_2_partner') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'image_2_partner') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-image_2_partner" class="image-product"
                                                id="image_2_partner" style="display: none">

                                        </label>
                                    </div>
                                </div>
                                <hr style="margin: 60px 0 10px;">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pb-4 mt-4">
                                        <label for="bg_contacts">Imagem Capa (Página > <a href="{{route('frontend.contacts')}}" target="_blank">Contato</a> )</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                        </div>
                                        <label for="bg_contacts"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_contacts') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_contacts') ? $content->getImage('originals', 'bg_contacts') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_contacts') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-bg_contacts" class="image-product"
                                                id="bg_contacts" style="display: none">

                                        </label>
                                    </div>
                                </div>
                                <hr style="margin: 60px 0 10px;">
                                <div class="form-row">


                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pb-4 mt-4">
                                        <label for="bg_reports">Imagem Capa (Página > <a href="{{route('frontend.reports')}}" target="_blank">Relatórios</a> )</label>
                                        <div class="col-12 d-flex align-items-center justify-content-center">
                                            <code>Dimensão da Imagem: 1170x778 (pixels)</code>
                                        </div>
                                        <label for="bg_reports"
                                            class="select-image banner-horizontal card d-flex align-items-center {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_reports') ? 'visible' : '' }}"
                                            style="background-image: url({{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_reports') ? $content->getImage('originals', 'bg_reports') : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">
                                            <span class="d-flex align-self-center" style="top: 10%">
                                                {{ isset($content) && $content->isFilled() && $content->getImage('originals', 'bg_reports') ? 'Alterar' : 'Selecionar' }}
                                                Imagem
                                            </span>
                                            <input type="file" name="file-bg_reports" class="image-product"
                                                id="bg_reports" style="display: none">

                                        </label>
                                    </div>
                                </div>
                                <hr style="margin: 60px 0 10px;">
                                <div class="form-grop mt-4 pt-4">


                                    <button type="submit" class="btn btn-primary float-right">
                                        {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                                    </button>
                                </div>
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
    <script src="{{ asset('public') }}/backend/vendor/summernote/js/summernote.min.js"></script>
    <script src="{{ asset('public') }}/backend/js/plugins-init/summernote-init.js"></script>
    <script src="{{ asset('public') }}/js/jquery.mask.js"></script>
    <script src="{{ asset('public') }}/js/mask.js"></script>


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
    </script>




@endsection
