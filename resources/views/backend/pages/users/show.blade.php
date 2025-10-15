@extends('backend.layouts.app')

@section('css_before')
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/select2/css/select2.min.css">
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
@endsection

@section('title-module', 'Usuários')

@section('inner')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('backend.users.index') }}">
                        {!! \Lang::choice('tables.users', 'p') !!}
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
                            {!! ($content->isFilled() ? \Lang::choice('tables.edit', 's') : \Lang::choice('tables.new', 's')) . ' ' . \Lang::choice('tables.users', 's') !!}
                        </h4>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST"
                            action="{{ $content->isFilled() ? route('backend.users.update', [$content->getId()]) : route('backend.users.store') }}">
                            @csrf
                            <div id="accordion-one" class="accordion accordion-primary">
                                <div class="accordion__item">
                                    <div class="accordion__header rounded-lg" data-toggle="collapse"
                                        data-target="#default_collapseOne">
                                        <span class="accordion__header--text">
                                            {!! \Lang::choice('tables.data', 'p') . ' ' . \Lang::choice('tables.basic', 'p') !!}
                                        </span>
                                        <span class="accordion__header--indicator"></span>
                                    </div>
                                    <div id="default_collapseOne" class="collapse accordion__body show"
                                        data-parent="#accordion-one">
                                        <div class="accordion__body--text">

                                            <div class="basic-form pt-5">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <div
                                                            class="col-12 d-flex align-items-center justify-content-center">
                                                            <code>Dimensão da Imagem: 500x500 (pixels)</code>
                                                        </div>
                                                        <label for="file"
                                                            class="select-image card d-flex align-items-center {{ isset($content) && $content->getImage() ? 'visible' : '' }}"
                                                            style="background-image: url({{ isset($content) && $content->getImage() ? $content->getImage() : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">

                                                            <span class="d-flex align-self-center" style="top: 10%">
                                                                {{ isset($content) && $content->getImage() ? 'Alterar' : 'Selecionar' }}
                                                                Imagem
                                                            </span>
                                                            <input type="file" name="file" class="image-product"
                                                                id="file" style="display: none">

                                                        </label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-8 col-lg-8">
                                                        <div class="form-group col-12">
                                                            <label>Primeiro Nome</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="name" value="{!! $content->getValue('name') !!}" required>
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label>Sobrenome</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="surname" value="{!! $content->getValue('surname') !!}" required>
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label>CPF</label>
                                                            <input type="text" class="form-control cpf" placeholder=""
                                                                name="document" value="{!! $content->getValue('document') !!}" required>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-row mt-4">
                                                    <div class="form-group col-3">
                                                        <label>Sexo</label>
                                                        <select id="inputState" name="sexe_id"
                                                            class="form-control default-select" required>
                                                            @foreach ($sexes as $key => $value)
                                                                <option value="{{ $value->getId() }}"
                                                                    {{ isset($content) && $content->sexe_id === $value->getId() ? 'selected' : '' }}>
                                                                    {!! $value->name !!}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label>Data de Nascimento</label>
                                                        <input type="date" class="form-control" name="birth_date"  autocomplete="off"
                                                            value="{!! (($content->getValue('birth_date') != '') ? (($content->getValue('birth_date')->format('Y-m-d')) ? $content->getValue('birth_date')->format('Y-m-d') : $content->getValue('birth_date') ) : '' )!!}">
                                                            
                                                    </div>
                                                    <div class="form-group col-3">
                                                        <label>Cargo</label>
                                                        <select id="office_id" name="office_id"
                                                            class="form-control default-select" required>
                                                            <option selected disabled>Selecione</option>
                                                            @foreach ($offices as $key => $value)
                                                                <option value="{{ $value->getId() }}"
                                                                    {{ isset($content) && $content->office_id === $value->getId() ? 'selected' : '' }}>
                                                                    {!! $value->name !!}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-3">
                                                        <label>Data da Admissão</label>
                                                        <input type="date" class="form-control" placeholder=""
                                                            name="admission_date"
                                                            value="{{ $content->isFilled() && $content->getValue('admission_date') && !$errors->any() ? $content->getValue('admission_date')->format('Y-m-d') : old('admission_date') }}">
                                                    </div>
                                                </div>
                                                <div class="form-row custom-input ">
                                                    <div class="form-group col-md-4">
                                                        <label>CEP</label>
                                                        <input type="text" id="cep"
                                                            class="form-control cep_with_callback" name="zipcode"
                                                            value="{!! $content->getValue('zipcode') !!}"
                                                            data-old="{!! $content->getValue('zipcode') !!}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Rua</label>
                                                        <input type="text" id="rua" class="form-control"
                                                            name="address" value="{!! $content->getValue('address') !!}"
                                                            data-old="{!! $content->getValue('address') !!}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Número</label>
                                                        <input type="text" id="numero" class="form-control"
                                                            name="number" value="{!! $content->getValue('number') !!}"
                                                            data-old="{!! $content->getValue('number') !!}">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Bairro</label>
                                                        <input type="text" id="bairro" class="form-control"
                                                            name="district" value="{!! $content->getValue('district') !!}"
                                                            data-old="{!! $content->getValue('district') !!}">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>País</label>
                                                        <select id="select_countries"
                                                            class="form-control select2 default-select" name="country_id"
                                                            data-old="{!! $content->getValue('country_id') !!}">
                                                            <option selected>Carregando...</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Estado</label>
                                                        <select id="select_states"
                                                            class="form-control select2 default-select" name="state_id"
                                                            data-old="{!! $content->getValue('state_id') !!}">
                                                            <option selected>Escolha o Pais</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Cidade</label>
                                                        <select id="select_cities"
                                                            class="form-control select2 default-select" name="city_id"
                                                            data-old="{!! $content->getValue('city_id') !!}">
                                                            <option selected>Escolha o Estado</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label>Celular</label>
                                                        <input type="phone" id="celular"
                                                            class="form-control sp_celphones" name="cellphone"
                                                            value="{!! $content->getValue('cellphone') !!}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" placeholder=""
                                                            name="email" value="{!! $content->getValue('email') !!}">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label>Senha</label>
                                                        <div class="input-group input-primary">

                                                            <input type="password" id="password" name="password"
                                                                class="form-control">
                                                            @if ($content->isFilled())
                                                                <div class="input-group-append">
                                                                    <label class="input-group-text">
                                                                        <input type="checkbox" class="mr-3"
                                                                            name="keep_password" id="keep_password"
                                                                            checked>
                                                                        <span class="mr-2 text-white">Manter Senha</span>
                                                                    </label>
                                                                </div>
                                                            @else
                                                                <div class="input-group-append">
                                                                    <label class="input-group-text">
                                                                        <input type="checkbox" class="mr-3"
                                                                            name="send_link_via_email" id="keep_password"
                                                                            checked>
                                                                        <span class="mr-2 text-white">Enviar acesso por
                                                                            E-mail</span>
                                                                    </label>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion__item">
                                    <div class="accordion__header collapsed  rounded-lg" data-toggle="collapse"
                                        data-target="#supplementary_data">
                                        <span class="accordion__header--text">Dados Complementares</span>
                                        <span class="accordion__header--indicator"></span>
                                    </div>
                                    <div id="supplementary_data" class="collapse accordion__body"
                                        data-parent="#accordion-one">
                                        <div class="accordion__body--text">
                                            <div class="form-row custom-input mt-4">

                                                <div class="form-group col-md-12">
                                                    <label>Cor declarada</label><br>
                                                    <label class="radio-inline mr-5">
                                                        <input type="radio" name="declared_color"
                                                            {{ $content->getValue('declared_color') === 'indigenous' ? 'checked' : '' }}
                                                            value="indigenous">
                                                        Indígena
                                                    </label>
                                                    <label class="radio-inline mr-5">
                                                        <input type="radio" name="declared_color"
                                                            {{ $content->getValue('declared_color') === 'white' ? 'checked' : '' }}
                                                            value="white">
                                                        Branca
                                                    </label>
                                                    <label class="radio-inline mr-5">
                                                        <input type="radio" name="declared_color"
                                                            {{ $content->getValue('declared_color') === 'black' ? 'checked' : '' }}
                                                            value="black">
                                                        Negra
                                                    </label>
                                                    <label class="radio-inline mr-5">
                                                        <input type="radio" name="declared_color"
                                                            {{ $content->getValue('declared_color') === 'yellow' ? 'checked' : '' }}
                                                            value="yellow">
                                                        Amarela
                                                    </label>
                                                    <label class="radio-inline mr-5">
                                                        <input type="radio" name="declared_color"
                                                            {{ $content->getValue('declared_color') === 'brown' ? 'checked' : '' }}
                                                            value="brown">
                                                        Parda
                                                    </label>
                                                    <label class="radio-inline mr-5">
                                                        <input type="radio" name="declared_color"
                                                            {{ $content->getValue('declared_color') === 'not_informed' ? 'checked' : '' }}
                                                            value="not_informed">
                                                        Não Informada
                                                    </label>
                                                    <hr>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Estado Civil</label><br>
                                                    <label class="radio-inline mr-5">
                                                        <input type="radio" name="marital_status"
                                                            {{ $content->getValue('marital_status') === 'single' ? 'checked' : '' }}
                                                            value="single">
                                                        Solteiro
                                                    </label>
                                                    <label class="radio-inline mr-5">
                                                        <input type="radio" name="marital_status"
                                                            {{ $content->getValue('marital_status') === 'married' ? 'checked' : '' }}
                                                            value="married">
                                                        Casado
                                                    </label>
                                                    <label class="radio-inline mr-5">
                                                        <input type="radio" name="marital_status"
                                                            {{ $content->getValue('marital_status') === 'divorced' ? 'checked' : '' }}
                                                            value="divorced">
                                                        Divorciado
                                                    </label>
                                                    <label class="radio-inline mr-5">
                                                        <input type="radio" name="marital_status"
                                                            {{ $content->getValue('marital_status') === 'widower' ? 'checked' : '' }}
                                                            value="widower">
                                                        Viúvo
                                                    </label>
                                                    <label class="radio-inline mr-5">
                                                        @php
                                                            $arr = ['widower', 'divorced', 'married', 'single'];
                                                        @endphp
                                                        <input type="radio" name="marital_status"
                                                            {{ !in_array($content->getValue('marital_status'), $arr) && $content->getValue('marital_status') ? 'checked' : '' }}
                                                            value="other">
                                                        Outro
                                                    </label>
                                                    <label class="radio-inline mr-5">
                                                        <input type="text" class="form-control"
                                                            name="other_marital_status" value="{!! $content->getValue('marital_status') && !$errors->any() ? $content->getValue('marital_status') : old('other_marital_status') !!}"
                                                            placeholder="Informe"
                                                            style="{{ !in_array($content->getValue('marital_status'), $arr) && $content->getValue('marital_status') ? 'display:block' : 'display:none' }}">
                                                    </label>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label>Nome Cônjuge:</label>
                                                    <input type="text" class="form-control" name="spouse_name"
                                                        value="{!! $content->getValue('spouse_name') !!}">
                                                </div>
                                            </div>

                                            <label>Filhos:</label>
                                            <div class="children-content">

                                                @php
                                                    $children = [];
                                                    
                                                    if ($content->getValue('children') && !$errors->any()) {
                                                        foreach ($content->getValue('children') as $key => $value) {
                                                            $children[$key] = $value;
                                                        }
                                                    } elseif ($errors->any()) {
                                                        foreach (old('children_name') as $key => $value) {
                                                            $children[$key]['name'] = $value;
                                                            $children[$key]['birthday'] = old('children_birthday')[$key] ? old('children_birthday')[$key] : '';
                                                            $children[$key]['document'] = old('children_document')[$key] ? old('children_document')[$key] : '';
                                                        }
                                                    }
                                                @endphp

                                                @if (count($children) > 0)
                                                    <div class="form-inline">
                                                        <div class="form-group mb-2">
                                                            <label class="sr-only">Nome</label>
                                                            <input type="text" name="children_name[]"
                                                                class="form-control" placeholder="Nome"
                                                                value="{!! $children[0]['name'] !!}">
                                                        </div>
                                                        <div class="form-group mx-sm-3 mb-2">
                                                            <label class="sr-only">Nascimento</label>
                                                            <input type="date" name="children_birthday[]"
                                                                class="form-control" placeholder="Nascimento"
                                                                value="{!! $children[0]['birthday'] !!}">
                                                        </div>
                                                        <div class="form-group mx-sm-3 mb-2">
                                                            <label class="sr-only">CPF</label>
                                                            <input type="text" name="children_document[]"
                                                                class="form-control cpf" placeholder="CPF"
                                                                value="{!! $children[0]['document'] !!}">
                                                        </div>

                                                        <button type="submit" data-html="children_html"
                                                            class="btn btn-primary mb-2 add item">
                                                            Adicionar [+]
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="form-inline">
                                                        <div class="form-group mb-2">
                                                            <label class="sr-only">Nome</label>
                                                            <input type="text" name="children_name[]"
                                                                class="form-control" placeholder="Nome" value="">
                                                        </div>
                                                        <div class="form-group mx-sm-3 mb-2">
                                                            <label class="sr-only">Nascimento</label>
                                                            <input type="date" name="children_birthday[]"
                                                                class="form-control" placeholder="Nascimento"
                                                                value="">
                                                        </div>
                                                        <div class="form-group mx-sm-3 mb-2">
                                                            <label class="sr-only">CPF</label>
                                                            <input type="text" name="children_document[]"
                                                                class="form-control cpf" placeholder="CPF"
                                                                value="">
                                                        </div>

                                                        <button type="submit" data-html="children_html"
                                                            class="btn btn-primary mb-2 add item">
                                                            Adicionar [+]
                                                        </button>
                                                    </div>
                                                @endif

                                                @if (count($children) > 1)
                                                    @php
                                                        unset($children[0]);
                                                    @endphp
                                                    @foreach ($children as $item)
                                                        <div class="form-inline --item">
                                                            <div class="form-group mb-2">
                                                                <label class="sr-only">Nome</label>
                                                                <input type="text" name="children_name[]"
                                                                    class="form-control" placeholder="Nome"
                                                                    value="{!! $item['name'] !!}">
                                                            </div>
                                                            <div class="form-group mx-sm-3 mb-2">
                                                                <label class="sr-only">Nascimento</label>
                                                                <input type="date" name="children_birthday[]"
                                                                    class="form-control" placeholder="Nascimento"
                                                                    value="{!! $item['birthday'] !!}">
                                                            </div>
                                                            <div class="form-group mx-sm-3 mb-2">
                                                                <label class="sr-only">CPF</label>
                                                                <input type="text" name="children_document[]"
                                                                    class="form-control cpf" placeholder="CPF"
                                                                    value="{!! $item['document'] !!}">
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-danger mr-2 mb-2 remove item">
                                                                Remover
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <hr>
                                            <h4>Documentação</h4>
                                            <hr>
                                            <div class="form-row">

                                                <div class="form-group col-md-4">
                                                    <label>RG</label>
                                                    <input type="text" class="form-control " name="rg"
                                                        value="{!! $content->getValue('rg') !!}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Local de Emissão</label>
                                                    <input type="text" class="form-control " name="rg_place_of_issue"
                                                        value="{!! $content->getValue('rg_place_of_issue') !!}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Data de Emissão</label>
                                                    <input type="date" class="form-control " name="rg_issue_date"
                                                        value="{{ $content->isFilled() && $content->getValue('rg_issue_date') && !$errors->any() ? $content->getValue('rg_issue_date')->format('Y-m-d') : old('rg_issue_date') }}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Carteira de Trabalho</label>
                                                    <input type="text" class="form-control " name="work_card"
                                                        value="{!! $content->getValue('work_card') !!}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Série</label>
                                                    <input type="text" class="form-control " name="work_card_series"
                                                        value="{!! $content->getValue('work_card_series') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Est. Emissor</label>
                                                    <input type="text" class="form-control "
                                                        name="work_card_issuing_state" value="{!! $content->getValue('work_card_issuing_state') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Data de Emissão</label>
                                                    <input type="date" class="form-control "
                                                        name="work_card_issuing_date"
                                                        value="{{ $content->isFilled() && $content->getValue('work_card_issuing_date') && !$errors->any() ? $content->getValue('work_card_issuing_date')->format('Y-m-d') : old('work_card_issuing_date') }}">
                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-3">
                                                    <label>Título de Eleitor</label>
                                                    <input type="text" class="form-control " name="voters_title"
                                                        value="{!! $content->getValue('voters_title') !!}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Zona</label>
                                                    <input type="text" class="form-control " name="voters_title_zone"
                                                        value="{!! $content->getValue('voters_title_zone') !!}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Seção</label>
                                                    <input type="text" class="form-control "
                                                        name="voters_title_section" value="{!! $content->getValue('voters_title_section') !!}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Estado</label>
                                                    <input type="text" class="form-control " name="voters_title_state"
                                                        value="{!! $content->getValue('voters_title_state') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Data de Emissão</label>
                                                    <input type="date" class="form-control "
                                                        name="voters_title_issue_date"
                                                        value="{{ $content->isFilled() && $content->getValue('voters_title_issue_date') && !$errors->any() ? $content->getValue('voters_title_issue_date')->format('Y-m-d') : old('voters_title_issue_date') }}">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Certif. Reservista:</label>
                                                    <input type="text" class="form-control "
                                                        name="reservist_certificate" value="{!! $content->getValue('reservist_certificate') !!}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Série:</label>
                                                    <input type="text" class="form-control "
                                                        name="reservist_certificate_series"
                                                        value="{!! $content->getValue('reservist_certificate_series') !!}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Categoria:</label>
                                                    <input type="text" class="form-control "
                                                        name="reservist_certificate_category"
                                                        value="{!! $content->getValue('reservist_certificate_category') !!}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>RM:</label>
                                                    <input type="text" class="form-control "
                                                        name="reservist_certificate_rm" value="{!! $content->getValue('reservist_certificate_rm') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Data de Emissão</label>
                                                    <input type="date" class="form-control "
                                                        name="reservist_certificate_issue_date"
                                                        value="{{ $content->isFilled() && $content->getValue('reservist_certificate_issue_date') && !$errors->any() ? $content->getValue('reservist_certificate_issue_date')->format('Y-m-d') : old('reservist_certificate_issue_date') }}">
                                                </div>

                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-4">
                                                    <label>Pis /Pasep:</label>
                                                    <input type="text" class="form-control " name="pis_pasep"
                                                        value="{!! $content->getValue('pis_pasep') !!}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>CNH /Cart. Motorista:</label>
                                                    <input type="text" class="form-control " name="cnh"
                                                        value="{!! $content->getValue('cnh') !!}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Categoria:</label>
                                                    <input type="text" class="form-control " name="cnh_category"
                                                        value="{!! $content->getValue('cnh_category') !!}">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Registro em órgão de Classe (Cref): nº</label>
                                                    <input type="text" class="form-control "
                                                        name="class_body_registration" value="{!! $content->getValue('class_body_registration') !!}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Órgão emissor:</label>
                                                    <input type="text" class="form-control "
                                                        name="class_body_registration_issuing_body"
                                                        value="{!! $content->getValue('class_body_registration_issuing_body') !!}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Validade:</label>
                                                    <input type="text" class="form-control "
                                                        name="class_body_registration_validaty"
                                                        value="{!! $content->getValue('class_body_registration_validaty') !!}">
                                                </div>

                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Banco</label>
                                                    <input type="text" class="form-control " name="bank"
                                                        value="{!! $content->getValue('bank') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Tipo de conta / Operação:</label>
                                                    <input type="text" class="form-control " name="bank_type"
                                                        value="{!! $content->getValue('bank_type') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Agência:</label>
                                                    <input type="text" class="form-control " name="bank_ag"
                                                        value="{!! $content->getValue('bank_ag') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Conta corrente:</label>
                                                    <input type="text" class="form-control " name="bank_ac"
                                                        value="{!! $content->getValue('bank_ac') !!}">
                                                </div>
                                            </div>
                                            <hr>
                                            <h4>Instrução</h4>
                                            <hr>

                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Grau de instrução</label>
                                                    <input type="text" class="form-control " name="education_level"
                                                        value="{!! $content->getValue('education_level') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Curso</label>
                                                    <input type="text" class="form-control " name="education_course"
                                                        value="{!! $content->getValue('education_course') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Estabelecimento</label>
                                                    <input type="text" class="form-control "
                                                        name="education_establishment" value="{!! $content->getValue('education_establishment') !!}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Conhece outros idiomas?</label>
                                                    <input type="text" class="form-control "
                                                        name="know_other_languages" value="{!! $content->getValue('know_other_languages') !!}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="accordion__item">
                                    <div class="accordion__header rounded-lg" data-toggle="collapse"
                                        data-target="#default_collapseTwo">
                                        <span class="accordion__header--text">Grupos de Usuários</span>
                                        <span class="accordion__header--indicator"></span>
                                    </div>
                                    <div id="default_collapseTwo" class="collapse accordion__body show"
                                        data-parent="#accordion-one">
                                        <div class="accordion__body--text">
                                            <div class="form-group pt-5 text-center">
                                                @foreach ($roles as $key => $value)
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" name="roles[]"
                                                                class="form-check-input no-uncheck"
                                                                value="{{ $value->name }}" required
                                                                {{ $content->hasRole($value->id) ? 'checked' : '' }}>
                                                            {!! \Functions::getNameRoles($value->name) !!}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @if ($content->isFilled())
                                    <div class="accordion__item">
                                        <div class="accordion__header rounded-lg" data-toggle="collapse"
                                            data-target="#default_collapseThree">
                                            <span class="accordion__header--text">Permissões</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseThree" class="collapse accordion__body show"
                                            data-parent="#accordion-one">
                                            <div class="accordion__body--text">
                                                <div class="row pt-5">
                                                    @foreach ($permissions as $key => $value)
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        id="{{ $value->name }}"
                                                                        value="{{ $value->name }}" name="permissions[]"
                                                                        {{ $content->hasPermissionTo($value->name) ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="{{ $value->name }}">
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
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary float-right">{!! $content->isFilled() ? \Lang::choice('tables.save', 's') : \Lang::choice('tables.new', 's') !!}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script src="{{ asset('public') }}/backend/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('public') }}/js/jquery.mask.js"></script>
    <script src="{{ asset('public') }}/js/mask.js"></script>

    <input type="hidden" name="api-region-countries" value="{{ route('api.region.countries') }}">
    <input type="hidden" name="api-region-states" value="{{ route('api.region.states') }}">
    <input type="hidden" name="api-region-cities" value="{{ route('api.region.cities') }}">
    <input type="hidden" name="api-region-search" value="{{ route('api.region.search') }}">

    <script src="{{ asset('public') }}/backend/js/components/region.users.js"></script>

    <script type="text/html" id="children_html">
        <div class="form-inline --item">
            <div class="form-group mb-2">
                <label class="sr-only">Nome</label>
                <input type="text" name="children_name[]" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label class="sr-only">Nascimento</label>
                <input type="date" name="children_birthday[]" class="form-control" placeholder="Nascimento">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label class="sr-only">CPF</label>
                <input type="text" name="children_document[]" class="form-control cpf" placeholder="CPF">
            </div>
            <button type="submit" class="btn btn-danger mr-2 mb-2 remove item">
                Remover
            </button>
        </div>
    </script>

    <script>
        $(".select2").select2();


        $('#password').prop('disabled', true);
        $("#password").css("cursor", "not-allowed");


        $('#keep_password').change(function() {
            if ($('#keep_password').is(':checked') == true) {
                $('#password').prop('disabled', true);
                $("#password").css("cursor", "not-allowed");
                console.log('checked');
            } else {
                $('#password').prop('disabled', false);
                $("#password").css("cursor", "inherit");
                console.log('unchecked');
            }
        });
    </script>

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

            // console.log(file);
        });

        $(document).on("click", "input[type='radio'][name=marital_status]", function(e) {
            console.log(this.value);
            if (this.value === 'other') {
                $('input[name=other_marital_status]').show();
            } else {
                $('input[name=other_marital_status]').hide();
            }

        });
        $(document).on("click", "input[type='radio']:not(.no-uncheck)", function(e) {
            var checked = $(this).attr("checked");
            if (!checked) {
                $(this).attr("checked", true);
            } else {
                $(this).removeAttr("checked");
                $(this).prop("checked", false);
            }
        });

        $(".add.item").click(function(e) {
            e.preventDefault();
            let html = '#' + $(this).data('html');
            var template = $(html).text();
            $(document).find('.children-content').append(template);
        });


        $(document).on("click", ".remove.item", function(e) {
            e.preventDefault();
            let item = $(this).closest('.--item');
            // let group = item.closest('.accordion__item');
            item.remove();
        });

        $(document).on('focus', '.cpf', function(e) {
            $(".cpf").mask("000.000.000-00", {
                reverse: true
            });
        });
    </script>
@endsection
