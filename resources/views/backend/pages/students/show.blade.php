@extends('backend.layouts.app')

@section('css_before')
<link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/select2/css/select2.min.css">
<link href="{{ asset('public') }}/backend//vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
<link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

<link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="{{ asset('public') }}/backend/vendor/summernote/summernote.css" rel="stylesheet">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet"
    href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

    <style>
    .customSwalBtn{
        background-color: rgba(214,130,47,1.00);
        border-left-color: rgba(214,130,47,1.00);
        border-right-color: rgba(214,130,47,1.00);
        border: 0;
        border-radius: 3px;
        box-shadow: none;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        font-weight: 500;
        margin: 30px 5px 0px 5px;
        padding: 10px 32px;
	}
    .swal2-popup{
        width: 40em;
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
                <a href="{{route($route . '.index')}}">
                    {!!\Lang::choice('tables.students', 'p')!!}
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
                        {!! ($content->isFilled() ? \Lang::choice('tables.edit', 's') : \Lang::choice('tables.new','s'))!!}
                        {!!\Lang::choice('tables.students', 's')!!}
                    </h4>
                </div>
                <div class="card-body">
                  <?php $routeData = $content->isFilled() ? [$route . '.update', $content->getId()] : $route . '.store';
					echo Form::open([
                      	'id' => "students-form",
                      	'route' => $routeData, 
                      	'method' => 'post', 
                      	'enctype' => "multipart/form-data", 
                      	'autocomplete' => "off"
                    ]); ?>
                        @csrf
                      	<input type="hidden" name="return" value="{{request()->return}}" />
                        <div id="accordion-one" class="accordion accordion-danger">
                            <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseOne">
                                    <span class="accordion__header--text">
                                        {!! \Lang::choice('tables.data', 'p') . ' ' . \Lang::choice('tables.required', 'p')!!}
                                    </span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="default_collapseOne" class="collapse accordion__body show"
                                    data-parent="#accordion-one">
                                    <div class="accordion__body--text">

                                        <div class="basic-form pt-5">
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                    <div class="col-12 d-flex align-items-center justify-content-center">
                                                        <code>Dimensão da Imagem: 500x500 (pixels)</code>
                                                    </div>
                                                    <label for="file"
                                                        class="select-image card d-flex align-items-center {{ isset($content) && $content->getImage() ? 'visible' : '' }}"
                                                        style="background-image: url({{ isset($content) && $content->getImage() ? $content->getImage() : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">

                                                        <span class="d-flex align-self-center" style="top: 10%">
                                                            {{ isset($content) && $content->getImage() ? 'Alterar' : 'Selecionar' }}
                                                            Imagem
                                                        </span>
                                                        <input type="file" name="file" class="image-product" id="file"
                                                            style="display: none">
                                                    </label>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-8 col-lg-8">
                                                    <div class="form-group col-12">
                                                        <label>Nome Completo</label>
                                                        <input type="text" class="form-control" placeholder="" autocomplete="off"
                                                            name="name" value="{!!$content->getValue('name')!!}">
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label>CPF</label>
                                                        <input type="text" class="form-control cpf" placeholder=""  autocomplete="off"
                                                            name="document" value="{!!$content->getValue('document')!!}">
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label>Sexo</label>
                                                        <select id="sexe" name="sexe_id"
                                                            class="form-control select2" required>
                                                            @foreach($sexes as $key => $value)
                                                            <option value="{{$value->getId()}}" {{(isset($content) && ($content->sexe_id === $value->getId())) ? 'selected' :''}}>{!!$value->name!!}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row custom-input mt-4">
                                                <div class="form-group col-md-6">
                                                    <label>Data de Nascimento</label>
                                                    <input type="date" class="form-control" name="birth_date"  autocomplete="off"
                                                        value="{!! (($content->getValue('birth_date') != '') ? ((!is_string($content->getValue('birth_date'))) ? $content->getValue('birth_date')->format('Y-m-d') : $content->getValue('birth_date') ) : '' )!!}">
                                                        
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Telefone</label>
                                                    <input type="text" class="form-control {{($content->getValue('phone')) ? '' : 'sp_celphones'}}" name="phone"  autocomplete="off"
                                                        value="{!!$content->getValue('phone')!!}" data-old="">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Nacionalidade (país)</label>
                                                    <select id="select_nationality_countries"
                                                        class="form-control select2" name="nationality_country_id"
                                                        data-old="{!!$content->getValue('nationality_country_id')!!}">
                                                        <option selected>Carregando...</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Naturalidade (Estado)</label>
                                                    <select id="select_nationality_states"
                                                        class="form-control select2" name="nationality_state_id"
                                                        data-old="{!!($content->getValue('nationality_state_id') != '') ? $content->getValue('nationality_state_id') : '11'!!}">
                                                        <option selected>Escolha o Estado</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Naturalidade (Cidade)</label>
                                                    <select id="select_nationality_cities"
                                                        class="form-control select2" name="nationality_city_id"
                                                        data-old="{!!($content->getValue('nationality_city_id') != '') ? $content->getValue('nationality_city_id') : '5220'!!}">
                                                        <option selected>Escolha o Estado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">    
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-success float-right">
                                                        {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseEight">
                                    <span class="accordion__header--text">Documentos Apresentados</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="default_collapseEight" class="collapse accordion__body show"
                                data-parent="#documments_recive">
                                    <div class="accordion__body--text --content pt-5">
                                        <div class="row">
                                            <div class="col-sm-3 col-6">
                                                <div class="custom-control custom-checkbox mb-3 checkbox-danger">
                                                    <input type="checkbox" class="custom-control-input" name="responsible_document" id="responsible_document" {{($content->getValue('responsible_document')) ? 'checked' : ''}} >
                                                    <label class="custom-control-label" for="responsible_document">Cópia do RG / CPF do Responsável </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-6">
                                                <div class="custom-control custom-checkbox mb-3 checkbox-danger">
                                                    <input type="checkbox" class="custom-control-input" name="certificate_birth" id="certificate_birth"  {{($content->getValue('certificate_birth')) ? 'checked' : ''}} >
                                                    <label class="custom-control-label" for="certificate_birth">Cópia da Cert. de Nac. ou RG do adolescente </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-6">
                                                <div class="custom-control custom-checkbox mb-3 checkbox-danger">
                                                    <input type="checkbox" class="custom-control-input" name="certificate_of_schooling" id="certificate_of_schooling"  {{($content->getValue('certificate_of_schooling')) ? 'checked' : ''}} >
                                                    <label class="custom-control-label" for="certificate_of_schooling">Atestado de Escolaridade </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-6">
                                                <div class="custom-control custom-checkbox mb-3 checkbox-success">
                                                    <input type="checkbox" class="custom-control-input" name="certificate_medical" id="certificate_medical"  {{($content->getValue('certificate_medical')) ? 'checked' : ''}} >
                                                    <label class="custom-control-label" for="certificate_medical">Atestado Médico</label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">    
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success float-right">
                                                    {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseEight">
                                    <span class="accordion__header--text">Identificação (Polo/Programa/Turma)</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="default_collapseEight" class="collapse accordion__body show"
                                    data-parent="#accordion-one">
                                    <div class="accordion__body--text --content" data-html="registrations_html">
                                        <div class="inner"> 
                                            @php
                                                $col = '4';
                                                $status_visible = false;
                                                if(Auth::guard('web')->user()->hasRole(['admin'])){
                                                    $col = '3';
                                                    $status_visible = true;
                                                }

                                                // # Get Units
                                                if (!Auth::guard('web')->user()->hasRole(['admin'])) $units_ = Auth::guard('web')->user()->units()->toArray();
                                                else $units_ = \App\Models\Unit::where('status', TRUE)->orderBy('name', 'ASC')->get()->toArray();

                                                $ids = [];
                                                foreach ($units_ as $key => $value) {
                                                    # code...
                                                    $ids[$key] = $value['id'];
                                                }
                                            @endphp
                                            @foreach ($content->registrations()->orderBy('created_at', 'ASC')->whereIn('unit_id', $ids)->get() as $item)
                                            <div class="form-row custom-input mt-5 --item">
                                                <input type="hidden" name="registrations_lasted_id[]" value="{!!$item->getId()!!}">
                                                <div class="form-group col-md-{{$col}}">
                                                    <label>Polo</label>
                                                    <select 
                                                        class="form-control select2" name="registrations_unit_id[]" data-old="{{$item->unit_id}}"  required>
                                                        @foreach($units as $key => $value)
                                                        <option value="{{$value->getId()}}" {{($value->getId() === $item->unit_id) ? 'selected' : ''}}>{!!$value->name!!}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-{{$col}}">
                                                    <label>Programa</label>
                                                    <select 
                                                        class="form-control select2" name="registrations_program_id[]" data-old="{{$item->program_id}}" required>
                                                        <option selected>Aguarde...</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group col-md-{{$col}}">
                                                    <label>Turma</label>
                                                    <select 
                                                        class="form-control select2" name="registrations_classe_id[]" data-old="{{$item->classe_id}}"  required>
                                                        <option selected>Aguarde...</option>
                                                    </select>
                                                </div>
                                                @if($status_visible)
                                                    <div class="form-group col-md-{{$col}}">
                                                        <label>Status</label>
                                                        <select 
                                                            class="form-control select2" name="registrations_status[]" data-old="{{$item->status}}">
                                                            <option value="1" {{($item->status) ? 'selected' : ''}}>Ativo</option>
                                                            <option value="0" {{(!$item->status) ? 'selected' : ''}}>Inativo</option>
                                                        </select>
                                                    </div>
                                                @endif
                                                <div class="form-group col-md-12" style="display: flex;flex-direction: column-reverse;">
                                                    <button type="submit" class="btn btn-danger remove item">
                                                        Remover
                                                    </button>
                                                </div>

                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="form-row d-flex justify-content-end">

                                            <button type="submit" class="btn btn-success float-right mr-2 btn-saved-action" style="{{($content->registrations()->count() === 0) ? 'display:none' : ''}}">
                                                {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                                            </button>

                                            <button type="submit" class="btn btn-primary add item">
                                                Cadastrar Dados do Projeto
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseTwo">
                                    <span class="accordion__header--text">Endereço do Aluno</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>

                                <div id="default_collapseTwo" class="collapse accordion__body show"
                                    data-parent="#accordion-one">
                                    <div class="accordion__body--text">
                                        <div class="form-row custom-input pt-5">
                                            <div class="form-group col-12" style="display: none">
                                                <div id="map"></div>
                                            </div>
                                            <div>
                                                <input type="hidden" name="lat" id="lat" value="{!!$content->getValue('lat')!!}">
                                                <input type="hidden" name="lng" id="lng" value="{!!$content->getValue('lng')!!}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>CEP</label>
                                                <input type="text" id="zipcode" class="form-control cep_with_callback"  autocomplete="off"
                                                    name="zipcode" value="{!!$content->getValue('zipcode')!!}" data-old="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Rua</label>
                                                <input type="text" id="address" class="form-control" name="address"  autocomplete="off"
                                                    value="{!!$content->getValue('address')!!}" data-old="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Número</label>
                                                <input type="text" id="number" class="form-control" name="number"  autocomplete="off"
                                                    value="{!!$content->getValue('number')!!}" data-old="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Bairro</label>
                                                <input type="text" id="district" class="form-control" name="district"  autocomplete="off"
                                                    value="{!!$content->getValue('district')!!}" data-old="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>País</label>
                                                <select id="select_countries"
                                                    class="form-control select2" name="country_id" 
                                                    data-old="{!!$content->getValue('country_id')!!}">
                                                    <option selected>Carregando...</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Estado</label>
                                                <select id="select_states" class="form-control select2 "
                                                    name="state_id" data-old="{!!($content->getValue('state_id') != '') ? $content->getValue('state_id') : '11'!!}">
                                                    <option selected>Escolha o Pais</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Cidade</label>
                                                <select id="select_cities" class="form-control select2"
                                                    name="city_id" data-old="{!!($content->getValue('city_id') != '') ? $content->getValue('city_id') : '5220'!!}">
                                                    <option selected>Escolha o Estado</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">    
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success float-right">
                                                    {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseThree">
                                    <span class="accordion__header--text">Dados dos Responsáveis</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="default_collapseThree" class="collapse accordion__body show"
                                    data-parent="#accordion-one">
                                    <div class="accordion__body--text">
                                        <div class="basic-form pt-5">
                                            <div class="form-row">
                                                <div class="form-group col-6">
                                                    <label>Nome da Mãe</label>
                                                    <input type="text" class="form-control" placeholder="" name="mother_name"
                                                        value="{!!$content->getValue('mother_name')!!}">
                                                </div>

                                                <div class="form-group col-6">
                                                    <label>CPF da Mãe</label>
                                                    <input type="text" class="form-control cpf" placeholder=""
                                                        name="mother_document" value="{!!$content->getValue('mother_document')!!}">
                                                </div>
                                            </div>
                                            <div class="form-row custom-input">
                                                <div class="form-group col-md-6">
                                                    <label>Profissão da Mãe</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="mother_office" value="{!!$content->getValue('mother_office')!!}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Telefone da Mãe</label>
                                                    <input type="text" class="form-control sp_celphones" placeholder=""
                                                        name="mother_phone" value="{!!$content->getValue('mother_phone')!!}">
                                                </div>
                                            </div>
                                            <div class="form-row mt-4">
                                                <div class="form-group col-6">
                                                    <label>Nome do Pai / Responsável</label>
                                                    <input type="text" class="form-control" placeholder="" name="father_name"
                                                        value="{!!$content->getValue('father_name')!!}">
                                                </div>

                                                <div class="form-group col-6">
                                                    <label>CPF do Pai / Responsável</label>
                                                    <input type="text" class="form-control cpf" placeholder=""
                                                        name="father_document" value="{!!$content->getValue('father_document')!!}">
                                                </div>
                                            </div>
                                            <div class="form-row custom-input">
                                                <div class="form-group col-md-6">
                                                    <label>Profissão do Pai / Responsável</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="father_office" value="{!!$content->getValue('father_office')!!}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Telefone do Pai / Responsável</label>
                                                    <input type="text" class="form-control sp_celphones" placeholder=""
                                                        name="father_phone" value="{!!$content->getValue('father_phone')!!}">
                                                </div>
                                            </div>
                                            <div class="form-row">    
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-success float-right">
                                                        {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseFour">
                                    <span class="accordion__header--text">Dados de Saúde / Segurança</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="default_collapseFour" class="collapse accordion__body show"
                                    data-parent="#accordion-one">
                                    <div class="accordion__body--text">
                                        <div class="form-row custom-input mt-5">
                                            <div class="form-group col-md-12 content">
                                                <label>O aluno terá acompanhamente para ir na aula e voltar para casa?</label>
                                                <div class="input-group input-primary">
                                                    <input type="text" id="go_classes" name="go_classes"
                                                        class="form-control inputFieldValidation" placeholder="Se sim: Quem será? (Informar o nome)" value="{!!$content->getValue('go_classes')!!}">
                                                    <div class="input-group-append">
                                                        <label class="input-group-text">
                                                            <input type="checkbox" class="mr-3 validationInput"
                                                                name="locomotionCheck" id="locomotionCheck" {{($content->getValue('go_classes') ? '' : 'checked')}}>
                                                            <span class="mr-2 text-white">NÃO - Autorizo que ele faça o translado (Escola/Casa/Escola) SOZINHO</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 content">
                                                <label>Possui Alergia?</label>
                                                <div class="input-group input-primary">
                                                    <input type="text" name="has_allergy" id="has_allergy" value="{!!$content->getValue('has_allergy')!!}"
                                                        class="form-control inputFieldValidation">
                                                    <div class="input-group-append">
                                                        <label class="input-group-text">
                                                            <input type="checkbox" class="mr-3 validationInput"
                                                                name="allergyCheck" id="allergyCheck" {{($content->getValue('has_allergy')) ? '' : 'checked'}}>
                                                            <span class="mr-2 text-white">Não Possui</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 content">
                                                <label>Toma Medicamento?</label>
                                                <div class="input-group input-primary">
                                                    <input type="text" name="has_controlled_medication" value="{!!$content->getValue('has_controlled_medication')!!}"
                                                        class="form-control inputFieldValidation">
                                                    <div class="input-group-append">
                                                        <label class="input-group-text">
                                                            <input type="checkbox" class="mr-3 validationInput"
                                                                name="medicineCheck" {{$content->getValue('has_controlled_medication') ? '' : 'checked'}}>
                                                            <span class="mr-2 text-white">Não Toma</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 content">
                                                <label>Já fez alguma cirurgia?</label>
                                                <div class="input-group input-primary">
                                                    <input type="text" name="had_surgery" id="had_surgery" value="{!!$content->getValue('had_surgery')!!}"
                                                        class="form-control inputFieldValidation">
                                                    <div class="input-group-append">
                                                        <label class="input-group-text">
                                                            <input type="checkbox" class="mr-3 validationInput"
                                                                name="surgeryCheck" id="surgeryCheck" {{$content->getValue('had_surgery') ? '' : 'checked'}}>
                                                            <span class="mr-2 text-white">Nunca Fez</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 content">
                                                <label>Tem Plano de Saúde?</label>
                                                <div class="input-group input-primary">
                                                    <input type="text" name="has_health_plan" id="has_health_plan" value="{!!$content->getValue('has_health_plan')!!}"
                                                        class="form-control inputFieldValidation">
                                                    <div class="input-group-append">
                                                        <label class="input-group-text">
                                                            <input type="checkbox" class="mr-3 validationInput"
                                                                name="healthPlanCheck" id="healthPlanCheck" {{($content->getValue('has_health_plan')) ? '' : 'checked'}}>
                                                            <span class="mr-2 text-white">Não Possui</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row custom-input">
                                            <div class="form-group col-md-6">
                                                <label>Altura</label>
                                                <input type="text" class="form-control height" placeholder=""
                                                    name="height" value="{!!$content->getValue('height')!!}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Peso</label>
                                                <input type="text" class="form-control weight" placeholder=""
                                                    name="weight" value="{!!$content->getValue('weight')!!}">
                                            </div>
                                            <div class="form-group col-xl-12 col-xxl-12 pt-5">
                                                <div class="card">
                                                    <label class="text-center">Recomendações sobre saúde ou
                                                        comportamento a serem observados</label>
                                                    <div class="card-body mt-n4 card-summernote">
                                                        <div class="summernote" data-ref="has_comments_health">{!! $content->getValue('has_comments_health') !!}</div>
                                                        <textarea name="has_comments_health" style="display: none;" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">    
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success float-right">
                                                    {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseFive">
                                    <span class="accordion__header--text">Aferição de Peso e Altura</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="default_collapseFive" class="collapse accordion__body show"
                                    data-parent="#accordion-one">
                                    <div class="accordion__body--text --content" data-html="measurements_html">
                                        <div class="inner"> 
                                            @foreach ($content->measurements()->orderBy('created_at', 'ASC')->get() as $item)
                                            <div class="form-row custom-input mt-5 --item">
                                                <input type="hidden" name="measurements_lasted_id[]" value="{!!$item->getId()!!}">
                                                <div class="form-group col-md-3">
                                                    <label>Data</label>
                                                    <input type="date" class="form-control" placeholder=""
                                                        name="measurements_date[]" value="{{$item->date->format('Y-m-d')}}"  required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Altura</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="measurements_height[]" value="{!!$item->height!!}"  required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Peso</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="measurements_weight[]" value="{!!$item->weight!!}"  required>
                                                </div>
                                                <div class="form-group col-md-3" style="display: flex;flex-direction: column-reverse;">
                                                    <button type="submit" class="btn btn-danger remove item">
                                                        Remover
                                                    </button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="form-row d-flex justify-content-end">

                                            <button type="submit" class="btn btn-success float-right mr-2 btn-saved-action" style="{{($content->measurements()->count() === 0) ? 'display:none' : ''}}">
                                                {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                                            </button>


                                            <button type="submit" class="btn btn-primary add item">
                                                Cadastrar
                                                Aferição
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseSix">
                                    <span class="accordion__header--text">Em caso de emergência ligar para</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="default_collapseSix" class="collapse accordion__body show"
                                    data-parent="#accordion-one">
                                    <div class="accordion__body--text --content" data-html="contacts_html">
                                        <div class="inner"> 
                                            @foreach($content->contacts()->orderBy('created_at', 'ASC')->get() as $key => $value)
                                            
                                            <div class="form-row custom-input mt-5 --item">
                                                <input type="hidden" name="contacts_lasted_id[]" value="{!!$value->getId()!!}">
                                                <div class="form-group col-md-3">
                                                    <label>Nome</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="contacts_name[]" value="{!!$value->name!!}"  required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Grau de parentesco</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="contacts_degree_of_kinship[]" value="{!!$value->degree_of_kinship!!}"  required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Telefone</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        name="contacts_phone[]" value="{!!$value->phone!!}"  required>
                                                </div>
                                                <div class="form-group col-md-3" style="display: flex;flex-direction: column-reverse;">
                                                    <button type="submit" class="btn btn-danger remove item">
                                                        Remover
                                                    </button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="form-row d-flex justify-content-end">

                                            <button type="submit" class="btn btn-success float-right mr-2 btn-saved-action"  style="{{($content->contacts()->count() === 0) ? 'display:none' : ''}}">
                                                {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                                            </button>
                                            
                                            <button type="submit" class="btn btn-primary add item">
                                                Cadastrar
                                                Contato de Emergência
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseSeven">
                                    <span class="accordion__header--text">Dados escolares</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="default_collapseSeven" class="collapse accordion__body show"
                                    data-parent="#accordion-one">
                                    <div class="accordion__body--text --content" data-html="schools_html">
                                        <div class="inner">   
                                            @foreach($content->schools()->orderBy('created_at', 'ASC')->get() as $key => $value) 
                                            
                                            <div class="form-row custom-input mt-5 --item">
                                                <input type="hidden" name="schools_lasted_id[]" value="{!!$value->getId()!!}">
                                                <div class="form-group col-md-4">
                                                    <label>Ano Letivo</label>
                                                    <input type="text" class="form-control" name="schools_academic_year[]"
                                                        value="{!!$value->academic_year!!}"  required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Escola</label>
                                                    <select class="form-control select2"
                                                        name="schools_school[]" data-old=""  required>
                                                        @foreach($schools as $key => $school)
                                                        <option value="{{$school->getId()}}" {{($school->getId() === $value->school_id) ? 'selected' : ''}}>{!!$school->name!!}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Período</label>
                                                    <select class="form-control select2"
                                                        name="schools_periodo[]" data-old=""  required>
                                                        <option value="1" {{($value->period === 1) ? 'selected' : ''}}>Matutino</option>
                                                        <option value="2" {{($value->period === 2) ? 'selected' : ''}}>Vespertino</option>
                                                        <option value="3" {{($value->period === 3) ? 'selected' : ''}}>Noturno</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Ensino</label>
                                                    <select
                                                        class="form-control select2" name="schools_teaching[]"
                                                        data-old=""  required>
                                                        <option value="1" {{($value->teaching === 1) ? 'selected' : ''}}>Ensino Fundamental</option>
                                                        <option value="2" {{($value->teaching === 2) ? 'selected' : ''}}>Ensino Médio</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Ano Escolar</label>
                                                    <select
                                                        class="form-control select2" name="schools_school_year[]"
                                                        data-old=""  required>
                                                        @foreach($school_years as $key => $school_year)
                                                        <option value="{{$school_year->getId()}}"  {{($school_year->getId() === (int)$value->school_year_id) ? 'selected' : ''}}>{!!$school_year->name!!}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Turma</label>
                                                    <input type="text" class="form-control" name="school_classe[]"
                                                        value="{!!$value->classe!!}"  required>
                                                </div>
                                                
                                                <div class="form-group col-md-12" style="display: flex;flex-direction: column-reverse;">
                                                    <button type="submit" class="btn btn-danger remove item">
                                                        Remover
                                                    </button>
                                                </div>
                                            </div>

                                            @endforeach

                                        </div>
                                        <div class="form-row d-flex justify-content-end">
                                        
                                            <button type="submit" class="btn btn-success float-right mr-2 btn-saved-action" style="{{($content->schools()->count() === 0) ? 'display:none' : ''}}">
                                                {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                                            </button>

                                            <button type="submit" class="btn btn-primary add item">
                                                Cadastrar
                                                Dados Escolares
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                         
                        
							
                            <!-- <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseNine">
                                    <span class="accordion__header--text">Anotações</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="default_collapseNine" class="collapse accordion__body show"
                                    data-parent="#accordion-one">
                                    <div id="DZ_W_TimeLine" class="widget-timeline dz-scroll py-5 mt-2">
                                        <ul class="timeline --items-annotations">
                                            @foreach($content->annotations()->orderBy('date', 'DESC')->limit(3)->get() as $key => $annotation)
                                            
                                            @php
                                                $uuid = uniqid();
                                            @endphp
                                            <li class="--item" ref-uuid="{{$uuid}}"> 
                                                <div class="timeline-badge primary"></div>
                                                <span class="timeline-panel text-muted">

                                                    

                                                    <input type="hidden" name="annotations_date[]"  data-ref="date"  value="{!!$annotation->date->format('Y-m-d')!!}">
                                                    <input type="hidden" name="annotations_title[]"  data-ref="title"  value="{!!$annotation->title!!}">
                                                    <input type="hidden" name="annotations_text[]"  data-ref="text"  value='{!!$annotation->text!!}'>
                                                    <span>{!!$annotation->date->format('d/m/Y')!!}</span>
                                                    <h6 class="mb-0">{!!$annotation->title!!}</h6>
                                                    <span>
                                                        {{-- {!!$annotation->text!!}  --}}
                                                        {!! mb_strimwidth(strip_tags($annotation->text), 0, 100, '...') !!}
                                                    </span>
                                                    <div class="mt-2">
                                                        <input type="hidden" name="UUID" value="{{$uuid}}">
                                                        <input type="hidden" name="annotations_lasted_id[]" value="{{$annotation->getId()}}">
                                                        <button type="button" data-toggle="modal" data-target="#add-annotation-modal" class="btn btn-primary btn-xxs shadow annotation edit item">Editar</button>
                                                        <button type="button" class="btn btn-outline-danger btn-xxs remove item">Apagar</button>
                                                    </div>
                                                </span>
                                            </li>

                                            @endforeach

                                        </ul>
                                    </div>

                                    <div class="form-row d-flex justify-content-end">


                                        <button type="submit" class="btn btn-success mt-4 mr-2">
                                            {!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                                        </button>
                                        <button type="button" data-toggle="modal" data-target="#add-annotation-modal" class="btn btn-primary mt-4">
                                            Cadastrar
                                            Nova Anotação
                                        </button>
                                    </div>
                                </div>
                            </div> -->

                            <div class="accordion__item">
                                <div class="accordion__header rounded-lg" data-toggle="collapse"
                                    data-target="#default_collapseTen">
                                    <span class="accordion__header--text">Status</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="default_collapseTen" class="collapse accordion__body show"
                                    data-parent="#accordion-one">
                                    <div class="accordion__body--text">
                                        <div class="row pt-5 d-flex justify-content-center">
                                            <div class="form-group col-md-4">
                                                <select
                                                    class="form-control select2" name="status" data-old="">
                                                    <option value="1" {{(($content->status === 1) ? 'selected' : '')}}>Ativo</option>
                                                    <option value="2" {{(($content->status === 2) ? 'selected' : '')}}>Inativo</option>
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
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade annotation modal" id="add-annotation-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Nova Anotação</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="#" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Data</label>
                            <input type="date" class="form-control" placeholder=""
                            name="annotations_date" value="" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label>Titulo</label>
                            <input type="text" class="form-control" placeholder=""
                            name="annotations_title" value="" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-xl-12 col-xxl-12 pt-5">
                            <div class="card">
                                <label class="text-center">Descrição da Observação</label>
                                <div class="card-body mt-n4">
                                    <div class="summernote" required></div>
                                    <textarea name="annotations_text" id="text" style="display: none;" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="UUID" value="">
                    <input type="hidden" name="annotations_lasted_id[]" value="">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary annotation insert" >Pronto</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js_after')
<script>
    const _LAT = "{{$content->getValue('lat')}}";
    const _LNG = "{{$content->getValue('lng')}}";
</script>
<script src="{{ asset('public') }}/backend//vendor/sweetalert2/dist/sweetalert2.min.js"></script>

<script src="{{ asset('public') }}/backend/vendor/select2/js/select2.full.min.js"></script>
<script src="{{ asset('public') }}/js/jquery.mask.js"></script>
<script src="{{ asset('public') }}/js/mask.js"></script>

<input type="hidden" name="api-region-countries" value="{{ route('api.region.countries') }}">
<input type="hidden" name="api-region-states" value="{{ route('api.region.states') }}">
<input type="hidden" name="api-region-cities" value="{{ route('api.region.cities') }}">
<input type="hidden" name="api-region-search" value="{{ route('api.region.search') }}">

<!-- -->
<input type="hidden" name="csrf_token" value="{{csrf_token()}}">
<input type="hidden" name="api-classes-units" value="{{ route('backend.api.classes.units') }}">
<input type="hidden" name="api-classes-programs" value="{{ route('backend.api.classes.programs') }}">
<input type="hidden" name="api-classes-classes" value="{{ route('backend.api.classes.classes') }}">


<input type="hidden" name="api-schools" value="{{ route('backend.api.schools.get') }}">


{{-- <script src="{{ asset('public') }}/backend/js/components/region.init.js"></script> --}}
<script src="{{ asset('public') }}/backend/js/components/region.students.js"></script>
<script src="{{ asset('public') }}/backend/js/components/classes.init.js"></script>

<script src="{{ asset('public') }}/backend/vendor/summernote/js/summernote.min.js"></script>
<script src="{{ asset('public') }}/backend/js/plugins-init/summernote-init.js"></script>

<!-- Jquery Validation -->
<script src="{{ asset('public') }}/backend/vendor/jquery-validation/jquery.validate.min.js"></script>

<!-- Form validate init -->
<script src="{{ asset('public') }}/backend/js/validate.students-init.js"></script>


<script id="measurements_html" type="text/html">
    <div class="form-row custom-input mt-5 --item">
        <div class="form-group col-md-3">
            <label>Data</label>
            <input type="date" class="form-control" placeholder=""
                name="measurements_date[]" value="">
        </div>
        <div class="form-group col-md-3">
            <label>Altura</label>
            <input type="text" class="form-control height" placeholder=""
                name="measurements_height[]" value="">
        </div>
        <div class="form-group col-md-3">
            <label>Peso</label>
            <input type="text" class="form-control weight" placeholder=""
                name="measurements_weight[]" value="">
        </div>
        <div class="form-group col-md-3" style="display: flex;flex-direction: column-reverse;">
            <button type="submit" class="btn btn-danger remove item">
                Remover
            </button>
        </div>
    </div>
</script>

@php
    $col = '4';
    $status_visible = false;
    if(Auth::guard('web')->user()->hasRole(['admin'])){
        $col = '3';
        $status_visible = true;
    }
@endphp
<script id="registrations_html" type="text/html">
    
    <div class="form-row custom-input mt-5 --item hasRequired">
        <div class="form-group col-md-{{$col}}">
            <label>Polo</label>
            <select class="form-control select2" name="registrations_unit_id[]" value="" data-old="">
                <option selected disabled>Selecione</option>
                @foreach($units as $key => $value)
                <option value="{{$value->getId()}}" >{!!$value->name!!}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-{{$col}}">
            <label>Programa</label>
            <select class="form-control select2" name="registrations_program_id[]" value="" data-old="">
                <option selected disabled>Aguarde...</option>
            </select>
        </div>
        <div class="form-group col-md-{{$col}}">
            <label>Turma</label>
            <select class="form-control select2" name="registrations_classe_id[]" value="" data-old="">
                <option selected disabled>Aguarde...</option>
            </select>
        </div>
        @if($status_visible)
        <div class="form-group col-md-{{$col}}">
            <label>Status</label>
            <select 
                class="form-control select2" name="registrations_status[]" data-old="">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>
        @endif
        <div class="form-group col-md-12" style="display: flex;flex-direction: column-reverse;">
            <button type="submit" class="btn btn-danger remove item">
                Remover
            </button>
        </div>
    </div>
</script>

<script id="contacts_html" type="text/html">
    <div class="form-row custom-input mt-5 --item">
        <div class="form-group col-md-3">
            <label>Nome</label>
            <input type="text" class="form-control" placeholder=""
                name="contacts_name[]" value="">
        </div>
        <div class="form-group col-md-3">
            <label>Grau de parentesco</label>
            <input type="text" class="form-control" placeholder=""
                name="contacts_degree_of_kinship[]" value="">
        </div>
        <div class="form-group col-md-3">
            <label>Telefone</label>
            <input type="text" class="form-control sp_celphones" placeholder=""
                name="contacts_phone[]" value="">
        </div>
        <div class="form-group col-md-3" style="display: flex;flex-direction: column-reverse;">
            <button type="submit" class="btn btn-danger remove item">
                Remover
            </button>
        </div>
    </div>
</script>


<script id="schools_html" type="text/html">
    <div class="form-row custom-input mt-5 --item">
        <div class="form-group col-md-4">
            <label>Ano Letivo</label>
            <input type="text" class="form-control" name="schools_academic_year[]"
                value="">
        </div>
        <div class="form-group col-md-4">
            <label>Escola</label>
            <select class="form-control select2"
                name="schools_school[]" data-old="">
                <option selected disabled>Escolha a escola</option>
                @foreach($schools as $key => $school)
                <option value="{{$school->getId()}}">{!!$school->name!!}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Período</label>
            <select class="form-control select2"
                name="schools_periodo[]" data-old="">
                <option disabled selected>Selecione</option>
                <option value="1">Matutino</option>
                <option value="2">Vespertino</option>
                <option value="3">Noturno</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Ensino</label>
            <select
                class="form-control select2" name="schools_teaching[]"
                data-old="">
                <option disabled selected>Selecione</option>
                <option value="1">Ensino Fundamental</option>
                <option value="2">Ensino Médio</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Ano Escolar</label>
            <select
                class="form-control select2" name="schools_school_year[]"
                data-old="">
                <option selected disabled>Escolha o ano escolar</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label>Turma</label>
            <input type="text" class="form-control" name="school_classe[]"
                value="">
        </div>
   
        <div class="form-group col-md-12" style="display: flex;flex-direction: column-reverse;">
            <button type="submit" class="btn btn-danger remove item">
                Remover
            </button>
        </div>
    </div>
</script>

<script id="annotation_html" type="text/html">
    <li class="--item" ref-uuid="%%UUID%%">
        <div class="timeline-badge primary"></div>
        <span class="timeline-panel text-muted">

            
            <input type="hidden" name="annotations_date[]" value="%%annotations_date%%">
            <input type="hidden" name="annotations_title[]" value="%%annotations_title%%">
            <input type="hidden" name="annotations_text[]" value='%%annotations_text%%'>
            <span>%%annotations_date%%</span>
            <h6 class="mb-0" >%%annotations_title%%</h6>
            <span>
                %%annotations_text%%
            </span>
            <div class="mt-2">
                <input type="hidden" name="UUID" value="%%UUID%%">
                <input type="hidden" name="annotations_lasted_id[]" value="%%lasted_id%%">
                <button type="button" data-toggle="modal" data-target="#add-annotation-modal" class="btn btn-primary btn-xxs shadow annotation edit item">Editar</button>
                <button type="button" class="btn btn-outline-danger btn-xxs remove item">Apagar</button>
            </div>
        </span>
    </li>
</script>

<script>

    function create_UUID(){
        var dt = new Date().getTime();
        var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = (dt + Math.random()*16)%16 | 0;
            dt = Math.floor(dt/16);
            return (c=='x' ? r :(r&0x3|0x8)).toString(16);
        });
        return uuid;
    }


    function selectRefresh($item = null) {
        if($item){
            $($item).select2();
        }else{
            $(".select2").select2();
        }
    }


    $('.validationInput').change(function() {
        let content = $(this).closest('.content');
        if ($(this).is(':checked') == true) {
            content.find('input[type=text]').prop('disabled', true);
            content.find('input[type=text]').css("cursor", "not-allowed");
            content.find('input[type=text]').val('');
        } else {
            content.find('input[type=text]').prop('disabled', false);
            content.find('input[type=text]').css("cursor", "inherit");
        }
    });

    $(document).ready(function(e){
        
        $('.validationInput').each(function(k,e){
            if($(e).is(':checked')){
                let content = $(e).closest('.content');
                content.find('input[type=text]').prop('disabled', true);
                content.find('input[type=text]').css("cursor", "not-allowed");
            }
        });
    })

    $(".add.item").click(function(e){
        e.preventDefault();


        let content = $(this).closest('.--content');
        let html = '#' + content.data('html');
        let group = content.closest('.accordion__item');


        var template = $(html).text();

        content.find('.inner').append(template);

        let select2 = content.find('.select2');
        

        selectRefresh(select2);

        if(group.find('.--item').length > 0){
            group.find('.btn-saved-action').css('display', 'block');
        }

        let inputs = content.find('select, input').each(function(key,element){

            $(element).prop('required', true);
            $(element).rules("add", "required"); 

        });


    });




    $(document).on("click", ".remove.item", function (e) {
        e.preventDefault();

        let item = $(this).closest('.--item');
        let group = item.closest('.accordion__item');

        item.remove();

        if(group.find('.--item').length === 0){
            // group.find('.btn-saved-action').css('display', 'none');
        }

    });


    $(document).on("click", ".annotation.insert", function (e) {

        let content = $(this).closest('.annotation.modal');

        let UUID_ = create_UUID();

        let form = content.find('form');
        let messageData = content.find('.summernote').summernote('code');
        let template = $("#annotation_html").text();

        let data = form.serializeArray();

        if(data[0].value === ''){
            alert('Preencha uma Data');
            return false;
        }
        if(data[1].value === ''){
            alert('Preencha um Titulo');
            return false;
        }
        if(messageData.replace( /(<([^>]+)>)/ig, '') === ''){
            alert('Preencha um Texto');
            return false;
        }
    

        template = template.replace("%%annotations_date%%", data[0].value);
        template = template.replace("%%annotations_date%%", data[0].value);
        template = template.replace("%%annotations_title%%", data[1].value);
        template = template.replace("%%annotations_title%%", data[1].value);

        template = template.replace("%%annotations_text%%", messageData);
        template = template.replace("%%annotations_text%%", messageData.replace( /(<([^>]+)>)/ig, ''));


        if((typeof data[3].value === 'undefined') || (data[3].value === '')){
            template = template.replace("%%UUID%%", UUID_);
            template = template.replace("%%UUID%%", UUID_);
            $('.--items-annotations').append(template);
        }else{
            let UUID = data[3].value;
            let el = $('[ref-uuid^=' + UUID + ']');
            template = template.replace("%%UUID%%", UUID);
            template = template.replace("%%UUID%%", UUID);
            el.after(template);
            el.remove();
        }

        $(content).modal('toggle');
        content.find('.summernote').summernote('reset');

        $(content).find('input').each(function(k, e){
            $(e).val('');
            console.log(k);
        })
    });

    $(document).on("click", ".annotations.remove", function (e) {
        e.preventDefault();
        let item = $(this).closest('.--item');
        item.remove();
    });
    
    $(document).on('click','.annotation.edit', function (e) {
        e.preventDefault();
        let modal = $(document).find('.annotation.modal');
        let item = $(this).closest('.--item');
        let inputs = item.find('input');
        inputs.map((key, element) => {

            let value = $(element).val();
            let name = $(element).attr("name").split('[]')[0];

            modal.find('input[name^=' + name + ']').val(value);

            if(name === 'annotations_text'){
                modal.find('.summernote').summernote('code', value);
            }

            console.log([name, value]);
        });

    });
</script>



<script>
    $(".image-product").on("change", function(e) {
        var file = $(this).get(0).files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $(".select-image").css(
                    "background-image",
                    "url("+ reader.result + ")"
                );
                $(".select-image").addClass("visible");
            };
            reader.readAsDataURL(file);
        } else {
            $(".select-image").removeClass("visible");
        }

    });

    $(document).ready(function() {
        selectRefresh();
    });

    $(document).on('focus', '.sp_celphones', function(e){
        var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, "").length === 11
                    ? "(00) 00000-0000"
                    : "(00) 0000-00009";
            },
            spOptions = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                },
            };

        $(".sp_celphones").mask(SPMaskBehavior, spOptions);
    });


    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
    });


</script>




@endsection