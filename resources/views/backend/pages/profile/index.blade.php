@extends('backend.layouts.app')


@section('css_before')
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/select2/css/select2.min.css">
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
@endsection

@section('title-module', 'Meu Perfil')

@section('inner')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Editar</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Meu Perfil</a></li>
            </ol>
        </div>
        <!-- row -->

        <!-- row -->
        <div class="row">
            <div class="col-12">
                @include('backend.layouts.alerts')
            </div>
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">

                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{!! \Auth::guard('web')->user()->getImage() !!}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{!! \Auth::guard('web')->user()->full_name !!}</h4>
                                    <p>{!! \Auth::guard('web')->user()->office_id ? \Auth::guard('web')->user()->office->name : 'Usuário' !!}</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{!! \Auth::guard('web')->user()->email !!}</h4>
                                    <p>Email</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#my-account" data-toggle="tab"
                                            class="nav-link active show">Editar Perfil</a>
                                    </li>
                                    {{-- <li class="nav-item"><a href="#log" data-toggle="tab"
                                            class="nav-link">Ações</a>
                                    </li> --}}
                                </ul>
                                <div class="tab-content">

                                    <div id="my-account" class="tab-pane fade active show">
                                        <div class="pt-3">
                                            <div class="settings-form">

                                                <form action="{{ route('backend.profile.update') }}" method="POST"
                                                    autocomplete="off" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                            <div
                                                                class="col-12 d-flex align-items-center justify-content-center">
                                                                <code>Dimensão da Imagem: 500x500 (pixels)</code>
                                                            </div>
                                                            <label for="file"
                                                                class="select-image card d-flex align-items-center {{ $content->isFilled() && $content->getImage() ? 'visible' : '' }}"
                                                                style="background-image: url({{ $content->isFilled() && $content->getImage() ? $content->getImage() : '' }}); background-position: center; margin-bottom: 10px; background-size: cover;">

                                                                <span class="d-flex align-self-center" style="top: 10%">
                                                                    {{ $content->isFilled() && $content->getImage() ? 'Alterar' : 'Selecionar' }}
                                                                    Foto de Perfil
                                                                </span>
                                                                <input type="file" name="file" class="image-product"
                                                                    id="file" style="display: none">

                                                            </label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group col-md-12">
                                                                <label>Email</label>
                                                                <input type="email" placeholder="E-mail"
                                                                    value="{!! $content->getValue('email') !!}" class="form-control"
                                                                    disabled readonly>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>Senha</label>
                                                                <div class="input-group input-primary">

                                                                    <input type="password" id="password" name="password"
                                                                        autocomplete="off" class="form-control"
                                                                        {{ \Auth::guard('web')->user()->status === 3 ? 'required' : '' }}>

                                                                    @if (\Auth::guard('web')->user()->status !== 3 && \Auth::guard('web')->user()->password)
                                                                        <div class="input-group-append">
                                                                            <label class="input-group-text">
                                                                                <input type="checkbox" class="mr-3"
                                                                                    name="keep_password" id="keep_password"
                                                                                    checked>
                                                                                <span class="mr-2 text-white">Manter
                                                                                    Senha</span>
                                                                            </label>
                                                                        </div>
                                                                    @else
                                                                        <div class="input-group-append">
                                                                            <label class="input-group-text">
                                                                                <input type="checkbox" class="mr-3"
                                                                                    name="show_password">
                                                                                <span class="mr-2 text-white">
                                                                                    Mostrar Senha
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    @endif

                                                                </div>
                                                                @if (\Auth::guard('web')->user()->status === 3 && !\Auth::guard('web')->user()->password)
                                                                    <label class="mt-2">Confirme a Senha</label>
                                                                    <div class="input-group input-primary">
                                                                        <input type="password" id="password_confirmation"
                                                                            name="password_confirmation" autocomplete="off"
                                                                            class="form-control mt-1"
                                                                            {{ \Auth::guard('web')->user()->status === 3 ? 'required' : '' }}>
                                                                        <div class="input-group-append">
                                                                            <label class="input-group-text">
                                                                                <input type="checkbox" class="mr-3"
                                                                                    name="show_password">
                                                                                <span class="mr-2 text-white">
                                                                                    Mostrar Senha
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-4">
                                                        <div class="form-group col-12">
                                                            <label>Primeiro Nome</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="name" value="{!! $content->getValue('name') !!}">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label>Sobrenome</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="surname" value="{!! $content->getValue('surname') !!}">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label>Sexo</label>
                                                            <select id="inputState" name="sexe_id"
                                                                class="form-control default-select" required>
                                                                @foreach ($sexes as $key => $value)
                                                                    <option value="{{ $value->getId() }}"
                                                                        {{ $content->isFilled() && $content->getValue('sexe_id') === $value->getId() ? 'selected' : '' }}>
                                                                        {!! $value->name !!}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row custom-input">
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
                                                                class="form-control select2 default-select"
                                                                name="country_id" data-old="{!! $content->getValue('country_id') !!}">
                                                                <option selected>Carregando...</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Estado</label>
                                                            <select id="select_states"
                                                                class="form-control select2 default-select"
                                                                name="state_id" data-old="{!! $content->getValue('state_id') !!}">
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


                                                    </div>
                                                    <hr>
                                                    <h4>Dados Complementares</h4>
                                                    <hr>
                                                    <div class="form-row custom-input">

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
                                                                    name="other_marital_status"
                                                                    value="{!! $content->getValue('marital_status') && !$errors->any() ? $content->getValue('marital_status') : old('other_marital_status') !!}" placeholder="Informe"
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
                                                                        class="form-control" placeholder="Nome"
                                                                        value="">
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
                                                        <div class="form-group col-md-3">
                                                            <label>CPF</label>
                                                            <input type="text" class="form-control cpf"
                                                                name="document" value="{!! $content->getValue('document') !!}" >
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>RG</label>
                                                            <input type="text" class="form-control " name="rg"
                                                                value="{!! $content->getValue('rg') !!}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Local de Emissão</label>
                                                            <input type="text" class="form-control "
                                                                name="rg_place_of_issue" value="{!! $content->getValue('rg_place_of_issue') !!}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Data de Emissão</label>
                                                            <input type="date" class="form-control "
                                                                name="rg_issue_date"
                                                                value="{{ $content->getValue('rg_issue_date') && !$errors->any() ? $content->getValue('rg_issue_date')->format('Y-m-d') : old('rg_issue_date') }}">
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
                                                            <input type="text" class="form-control "
                                                                name="work_card_series" value="{!! $content->getValue('work_card_series') !!}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Est. Emissor</label>
                                                            <input type="text" class="form-control "
                                                                name="work_card_issuing_state"
                                                                value="{!! $content->getValue('work_card_issuing_state') !!}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Data de Emissão</label>
                                                            <input type="date" class="form-control "
                                                                name="work_card_issuing_date"
                                                                value="{{ $content->getValue('work_card_issuing_date') && !$errors->any() ? $content->getValue('work_card_issuing_date')->format('Y-m-d') : old('work_card_issuing_date') }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">

                                                        <div class="form-group col-md-3">
                                                            <label>Título de Eleitor</label>
                                                            <input type="text" class="form-control "
                                                                name="voters_title" value="{!! $content->getValue('voters_title') !!}">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Zona</label>
                                                            <input type="text" class="form-control "
                                                                name="voters_title_zone" value="{!! $content->getValue('voters_title_zone') !!}">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Seção</label>
                                                            <input type="text" class="form-control "
                                                                name="voters_title_section"
                                                                value="{!! $content->getValue('voters_title_section') !!}">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Estado</label>
                                                            <input type="text" class="form-control "
                                                                name="voters_title_state"
                                                                value="{!! $content->getValue('voters_title_state') !!}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Data de Emissão</label>
                                                            <input type="date" class="form-control "
                                                                name="voters_title_issue_date"
                                                                value="{{ $content->getValue('voters_title_issue_date') && !$errors->any() ? $content->getValue('voters_title_issue_date')->format('Y-m-d') : old('voters_title_issue_date') }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label>Certif. Reservista:</label>
                                                            <input type="text" class="form-control "
                                                                name="reservist_certificate"
                                                                value="{!! $content->getValue('reservist_certificate') !!}">
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
                                                                name="reservist_certificate_rm"
                                                                value="{!! $content->getValue('reservist_certificate_rm') !!}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Data de Emissão</label>
                                                            <input type="date" class="form-control "
                                                                name="reservist_certificate_issue_date"
                                                                value="{{ $content->getValue('reservist_certificate_issue_date') && !$errors->any() ? $content->getValue('reservist_certificate_issue_date')->format('Y-m-d') : old('reservist_certificate_issue_date') }}">
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
                                                            <input type="text" class="form-control "
                                                                name="cnh_category" value="{!! $content->getValue('cnh_category') !!}">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label>Registro em órgão de Classe (Cref): nº</label>
                                                            <input type="text" class="form-control "
                                                                name="class_body_registration"
                                                                value="{!! $content->getValue('class_body_registration') !!}">
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
                                                            <input type="text" class="form-control "
                                                                name="education_level" value="{!! $content->getValue('education_level') !!}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Curso</label>
                                                            <input type="text" class="form-control "
                                                                name="education_course" value="{!! $content->getValue('education_course') !!}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Estabelecimento</label>
                                                            <input type="text" class="form-control "
                                                                name="education_establishment"
                                                                value="{!! $content->getValue('education_establishment') !!}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Conhece outros idiomas?</label>
                                                            <input type="text" class="form-control "
                                                                name="know_other_languages"
                                                                value="{!! $content->getValue('know_other_languages') !!}">
                                                        </div>
                                                    </div>


                                                    <button class="btn btn-success" type="submit">
                                                        Atualizar Dados
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- Modal -->

                        </div>
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


        @if (\Auth::guard('web')->user()->status !== 3 && \Auth::guard('web')->user()->password)
            $('#password').prop('disabled', true);
            $("#password").css("cursor", "not-allowed");


            $('#keep_password').change(function() {
                if ($('#keep_password').is(':checked') == true) {
                    $('#password').prop('disabled', true);
                    $("#password").css("cursor", "not-allowed");

                } else {
                    $('#password').prop('disabled', false);
                    $("#password").css("cursor", "inherit");

                }
            });
        @endif

        $("input[name=show_password]").change(function(e) {

            let content = $(this).closest('.input-group');
            if ($(this).is(':checked') == true) {
                let input = content.find('input[type=password]');
                input.prop("type", "text");

            } else {
                let input = content.find('input[type=text]');
                input.prop("type", "password");
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
        $(document).on("click", "input[type='radio']", function(e) {
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
