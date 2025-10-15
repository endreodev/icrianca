@extends('backend.layouts.app')


@section('css_before')
    <link rel="stylesheet" href="{{ asset('public') }}/backend/vendor/select2/css/select2.min.css">
    <link href="{{ asset('public') }}/backend//vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

    <link href="{{ asset('public') }}/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('public') }}/backend/vendor/summernote/summernote.css" rel="stylesheet">
@endsection


@section('title-module', 'Pesquisa')

@section('inner')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                </li>
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0)">
                        Pesquisas
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
                    <div class="card-body">

                        <div class="basic-form pt-5">
                            <form enctype="multipart/form-data" id="students-form" method="POST" autocomplete="off"
                                action="{{ route('backend.researches.update', [$content->getId()]) }}">
                                @csrf
                                <div class="form-row custom-input">
                                    <div class="form-group col-md-6">
                                        <label>Aluno</label>
                                        <input type="text" class="form-control" value="{!! $content->getValue('students')->name !!}"
                                            name="student_name" disabled readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Ano de Referência</label>
                                        <select id="select_when_date" class="form-control select2 default-select"
                                            name="select_when_date">
                                            @foreach (range(date('Y'), 1990) as $key => $item)
                                                <option value={{ $item }}
                                                    {{ $key === 0 && !request()->year ? 'selected' : (request()->year === (string) $item ? 'selected' : '') }}>
                                                    {!! $item !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Sexo</label>
                                        <input type="text" class="form-control" value="{!! $content->getValue('students')->sex->name !!}"
                                            name="reference_year" disabled readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Idade</label>
                                        <input type="text" class="form-control" value="{!! $content->getValue('students')->getYears() !!}"
                                            name="age-student" disabled readonly>
                                    </div>

                                    <hr>
                                    <div class="form-group col-md-12 mt-4">
                                        <h4>Pesquisa Comportamental</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Quando começou participar do programa?</label>
                                        <select id="when_did_you_start_program" class="form-control select2 default-select"
                                            name="when_did_you_start_program">
                                            <option value=""
                                                {{ !$content->getValue('when_did_you_start_program') ? 'selected' : '' }}>
                                                Selecione</option>
                                            @foreach (range(date('Y'), 2000) as $key => $item)
                                                <option value={{ $item }}
                                                    {{ (string) $item === $content->getValue('when_did_you_start_program') ? 'selected' : '' }}>
                                                    {!! $item !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Como ficou sabendo do programa?</label>
                                        <select id="how_did_you_program" name="how_did_you_program" tabindex="-1"
                                            class="form-control select2 default-select change-other" data-other="3"
                                            aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('how_did_you_program') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('how_did_you_program') === 1 ? 'selected' : '' }}>
                                                Escola</option>
                                            <option value="2"
                                                {{ $content->getValue('how_did_you_program') === 2 ? 'selected' : '' }}>
                                                Mídias (TV, Jornal, internet)</option>
                                            <option value="3"
                                                {{ $content->getValue('how_did_you_program') === 3 ? 'selected' : '' }}>
                                                Outros</option>
                                        </select>

                                        <input type="text" class="form-control mt-2" id="how_did_you_program_other"
                                            style="{{ $content->getValue('how_did_you_program') === 3 ? 'display:block' : 'display:none' }}"
                                            name="how_did_you_program_other" value="{!! $content->getValue('how_did_you_program_other') !!}">

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>O que levou a participar do programa?</label>
                                        <select id="what_led_to_program" name="what_led_to_program" tabindex="-1"
                                            class="form-control select2 default-select change-other" data-other="5"
                                            aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('what_led_to_program') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('what_led_to_program') === 1 ? 'selected' : '' }}>
                                                Satisfeito com o ano anterior</option>
                                            <option value="2"
                                                {{ $content->getValue('what_led_to_program') === 2 ? 'selected' : '' }}>
                                                Ocupação do tempo livre</option>
                                            <option value="3"
                                                {{ $content->getValue('what_led_to_program') === 3 ? 'selected' : '' }}>
                                                Interesse por atividade educativa</option>
                                            <option value="4"
                                                {{ $content->getValue('what_led_to_program') === 4 ? 'selected' : '' }}>
                                                Recomendação da escola</option>
                                            <option value="5"
                                                {{ $content->getValue('what_led_to_program') === 5 ? 'selected' : '' }}>
                                                Outros</option>
                                        </select>

                                        <input type="text" class="form-control mt-2" name="what_led_to_program_other"
                                            value="{{ $content->getValue('what_led_to_program_other') }}"
                                            style="{{ $content->getValue('what_led_to_program') === 5 ? 'display:block' : 'display:none' }}"
                                            id="what_led_to_program_other">

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Já parou de estudar alguma vez?</label>
                                        <select id="have_you_ever_stopped_studying" name="have_you_ever_stopped_studying"
                                            tabindex="-1" class="form-control select2 default-select" aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('have_you_ever_stopped_studying') ? 'selected' : '' }}>
                                                Selecione
                                            </option>
                                            <option value="1"
                                                {{ $content->getValue('have_you_ever_stopped_studying') === 1 ? 'selected' : '' }}>
                                                Sim</option>
                                            <option value="2"
                                                {{ $content->getValue('have_you_ever_stopped_studying') === 2 ? 'selected' : '' }}>
                                                Não</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Em que ano?</label>
                                        <input type="text" class="form-control" value="{!! $content->getValue('in_what_year') !!}"
                                            name="in_what_year">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Precisou de reforço escolar?</label>
                                        <select id="did_you_need_tutoring" name="did_you_need_tutoring" tabindex="-1"
                                            class="form-control select2 default-select" aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('did_you_need_tutoring') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('did_you_need_tutoring') === 1 ? 'selected' : '' }}>
                                                Sim</option>
                                            <option value="2"
                                                {{ $content->getValue('did_you_need_tutoring') === 2 ? 'selected' : '' }}>
                                                Não</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Teve dificuldade com o aprendizado?</label>
                                        <select id="had_difficulty_learning" name="had_difficulty_learning"
                                            tabindex="-1" class="form-control select2 default-select"
                                            aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('had_difficulty_learning') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('had_difficulty_learning') === 1 ? 'selected' : '' }}>
                                                Sim</option>
                                            <option value="2"
                                                {{ $content->getValue('had_difficulty_learning') === 2 ? 'selected' : '' }}>
                                                Não</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Qual a situação familiar?</label>
                                        <select id="what_is_the_family_situation" name="what_is_the_family_situation"
                                            tabindex="-1" class="form-control select2 default-select"
                                            aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('what_is_the_family_situation') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('what_is_the_family_situation') === 1 ? 'selected' : '' }}>
                                                Pais casados</option>
                                            <option value="2"
                                                {{ $content->getValue('what_is_the_family_situation') === 2 ? 'selected' : '' }}>
                                                Pais separados</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Com quem mora atualmente?</label>
                                        <select id="with_currently_lives" name="with_currently_lives" tabindex="-1"
                                            class="form-control select2 default-select change-other" data-other="7"
                                            aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('with_currently_lives') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('with_currently_lives') === 1 ? 'selected' : '' }}>
                                                Com os Pais biológicos</option>
                                            <option value="2"
                                                {{ $content->getValue('with_currently_lives') === 2 ? 'selected' : '' }}>
                                                Com os Avós</option>
                                            <option value="3"
                                                {{ $content->getValue('with_currently_lives') === 3 ? 'selected' : '' }}>
                                                Só com o Pai</option>
                                            <option value="4"
                                                {{ $content->getValue('with_currently_lives') === 4 ? 'selected' : '' }}>
                                                Só com a Mãe</option>
                                            <option value="5"
                                                {{ $content->getValue('with_currently_lives') === 5 ? 'selected' : '' }}>
                                                Pai com companheira</option>
                                            <option value="6"
                                                {{ $content->getValue('with_currently_lives') === 6 ? 'selected' : '' }}>
                                                Mãe com companheiro</option>
                                            <option value="7"
                                                {{ $content->getValue('with_currently_lives') === 7 ? 'selected' : '' }}>
                                                Outros</option>
                                        </select>
                                        <input type="text" class="form-control mt-2" id="with_currently_lives_other"
                                            name="with_currently_lives_other"
                                            value="{{ $content->getValue('with_currently_lives_other') }}"
                                            style="{{ $content->getValue('with_currently_lives') === 7 ? 'display:block' : 'display:none' }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Quantidade de pessoas da família morando na casa?</label>
                                        <select id="how_many_people_same_household" name="how_many_people_same_household"
                                            tabindex="-1" class="form-control select2 default-select"
                                            aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('how_many_people_same_household') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('how_many_people_same_household') === 1 ? 'selected' : '' }}>
                                                2</option>
                                            <option value="2"
                                                {{ $content->getValue('how_many_people_same_household') === 2 ? 'selected' : '' }}>
                                                3</option>
                                            <option value="3"
                                                {{ $content->getValue('how_many_people_same_household') === 3 ? 'selected' : '' }}>
                                                4</option>
                                            <option value="4"
                                                {{ $content->getValue('how_many_people_same_household') === 4 ? 'selected' : '' }}>
                                                5</option>
                                            <option value="5"
                                                {{ $content->getValue('how_many_people_same_household') === 5 ? 'selected' : '' }}>
                                                6</option>
                                            <option value="6"
                                                {{ $content->getValue('how_many_people_same_household') === 6 ? 'selected' : '' }}>
                                                7 ou Mais</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Quando não está na escola, com quem a criança fica?</label>
                                        <select id="when_you_child_stay" name="when_you_child_stay" tabindex="-1"
                                            data-other="3" class="form-control select2 default-select change-other"
                                            aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('when_you_child_stay') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('when_you_child_stay') === 1 ? 'selected' : '' }}>
                                                Familiares</option>
                                            <option value="2"
                                                {{ $content->getValue('when_you_child_stay') === 2 ? 'selected' : '' }}>
                                                Sozinho</option>
                                            <option value="3"
                                                {{ $content->getValue('when_you_child_stay') === 3 ? 'selected' : '' }}>
                                                Outros</option>
                                        </select>
                                        <input type="text" class="form-control mt-2" name="when_you_child_stay_other"
                                            id="when_you_child_stay_other"
                                            value="{{ $content->getValue('when_you_child_stay_other') }}"
                                            style="{{ $content->getValue('when_you_child_stay') === 3 ? 'display:block' : 'display:none' }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Qual a condições de moradia?</label>
                                        <select id="what_living_conditions" name="what_living_conditions" tabindex="-1"
                                            data-other="3" class="form-control select2 default-select change-other"
                                            aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('what_living_conditions') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('what_living_conditions') === 1 ? 'selected' : '' }}>
                                                Casa própria</option>
                                            <option value="2"
                                                {{ $content->getValue('what_living_conditions') === 2 ? 'selected' : '' }}>
                                                Alugada</option>
                                            <option value="3"
                                                {{ $content->getValue('what_living_conditions') === 3 ? 'selected' : '' }}>
                                                Outros</option>
                                        </select>
                                        <input type="text" class="form-control mt-2" id="what_living_conditions_other"
                                            name="what_living_conditions_other"
                                            value="{{ $content->getValue('what_living_conditions_other') }}"
                                            style="{{ $content->getValue('what_living_conditions') === 3 ? 'display:block' : 'display:none' }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Seu filho tem perfil em alguma rede social?</label>
                                        <select id="your_child_has_social_network" name="your_child_has_social_network"
                                            tabindex="-1" class="form-control select2 default-select "
                                            aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('your_child_has_social_network') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('your_child_has_social_network') === 1 ? 'selected' : '' }}>
                                                Sim</option>
                                            <option value="2"
                                                {{ $content->getValue('your_child_has_social_network') === 2 ? 'selected' : '' }}>
                                                Não</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Qual o principal meio de acesso à internet?</label>
                                        <select id="what_is_accessing_the_internet" name="what_is_accessing_the_internet"
                                            tabindex="-1" class="form-control select2 default-select "
                                            aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('what_is_accessing_the_internet') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('what_is_accessing_the_internet') === 1 ? 'selected' : '' }}>
                                                Particular (casa ou celular)</option>
                                            <option value="2"
                                                {{ $content->getValue('what_is_accessing_the_internet') === 2 ? 'selected' : '' }}>
                                                Público (escola, comunidade...)</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Qual o principal meio de transporte da família?</label>
                                        <select id="what_family_means_of_transportation"
                                            name="what_family_means_of_transportation" tabindex="-1"
                                            class="form-control select2 default-select " aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('what_family_means_of_transportation') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('what_family_means_of_transportation') === 1 ? 'selected' : '' }}>
                                                Particular (carro, moto, bicicleta)</option>
                                            <option value="2"
                                                {{ $content->getValue('what_family_means_of_transportation') === 2 ? 'selected' : '' }}>
                                                Público</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label>Grau de escolaridade de quem está respondendo esta pesquisa?</label>
                                        <select id="level_of_education" name="level_of_education" tabindex="-1"
                                            class="form-control select2 default-select " aria-hidden="true">
                                            <option value=""
                                                {{ !$content->getValue('level_of_education') ? 'selected' : '' }}>
                                                Selecione</option>
                                            <option value="1"
                                                {{ $content->getValue('level_of_education') === 1 ? 'selected' : '' }}>
                                                Não frequentou escola</option>
                                            <option value="2"
                                                {{ $content->getValue('level_of_education') === 2 ? 'selected' : '' }}>
                                                Ensino Fundamental (1ª a 4ª série)</option>
                                            <option value="3"
                                                {{ $content->getValue('level_of_education') === 3 ? 'selected' : '' }}>
                                                Ensino Fundamental (5ª a 8ª série)</option>
                                            <option value="4"
                                                {{ $content->getValue('level_of_education') === 4 ? 'selected' : '' }}>
                                                Ensino Médio (1º ao 3º Ano)</option>
                                            <option value="5"
                                                {{ $content->getValue('level_of_education') === 5 ? 'selected' : '' }}>
                                                Ensino Superior Incompleto</option>
                                            <option value="6"
                                                {{ $content->getValue('level_of_education') === 6 ? 'selected' : '' }}>
                                                Ensino Superior Completo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success float-right">
                                            Salvar Pesquisa
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @foreach ($content->instutional()->get() as $key => $instutional)
                            <div id="accordion-one-{{ $instutional->getId() }}" class="accordion accordion-danger">
                                <div class="accordion__item">

                                    <form
                                        action="{{ route('backend.researches-institutional.update', $instutional->getId()) }}"
                                        method="POST">
                                        @csrf

                                        <div class="accordion__header rounded-lg" data-toggle="collapse"
                                            data-target="#default_collapseOne">
                                            <span class="accordion__header--text">
                                                {{ $key + 1 }}ª Pesquisa Institucional
                                            </span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseOne" class="collapse accordion__body show"
                                            data-parent="#accordion-one">
                                            <div class="accordion__body--text">

                                                @if (request()->instutional === (string) $instutional->getId())
                                                    <div class="row pt-4 m-1">
                                                        <div class="col-12">
                                                            @include('backend.layouts.alerts')
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="basic-form pt-5">
                                                    <div class="form-row custom-input">
                                                        <div class="form-group col-md-12">
                                                            <label>Interesse em Estudar:</label><br>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="interest_in_studying"
                                                                    value="1"
                                                                    {{ $instutional->getValue('interest_in_studying') === 1 ? 'checked' : '' }}>
                                                                Requer Orientação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="interest_in_studying"
                                                                    value="2"
                                                                    {{ $instutional->getValue('interest_in_studying') === 2 ? 'checked' : '' }}>
                                                                Requer Observação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="interest_in_studying"
                                                                    value="3"
                                                                    {{ $instutional->getValue('interest_in_studying') === 3 ? 'checked' : '' }}>
                                                                Bom
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="interest_in_studying"
                                                                    value="4"
                                                                    {{ $instutional->getValue('interest_in_studying') === 4 ? 'checked' : '' }}>
                                                                Ótimo
                                                            </label>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Comportamento:</label><br>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="behavior" value="1"
                                                                    {{ $instutional->getValue('behavior') === 1 ? 'checked' : '' }}>
                                                                Requer Orientação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="behavior" value="2"
                                                                    {{ $instutional->getValue('behavior') === 2 ? 'checked' : '' }}>
                                                                Requer Observação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="behavior" value="3"
                                                                    {{ $instutional->getValue('behavior') === 3 ? 'checked' : '' }}>
                                                                Bom
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="behavior" value="4"
                                                                    {{ $instutional->getValue('behavior') === 4 ? 'checked' : '' }}>
                                                                Ótimo
                                                            </label>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Responsabilidade:</label><br>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="responsibility"
                                                                    value="1"
                                                                    {{ $instutional->getValue('responsibility') === 1 ? 'checked' : '' }}>
                                                                Requer Orientação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="responsibility"
                                                                    value="2"
                                                                    {{ $instutional->getValue('responsibility') === 2 ? 'checked' : '' }}>
                                                                Requer Observação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="responsibility"
                                                                    value="3"
                                                                    {{ $instutional->getValue('responsibility') === 3 ? 'checked' : '' }}>
                                                                Bom
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="responsibility"
                                                                    value="4"
                                                                    {{ $instutional->getValue('responsibility') === 4 ? 'checked' : '' }}>
                                                                Ótimo
                                                            </label>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Respeito:</label><br>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="respect" value="1"
                                                                    {{ $instutional->getValue('respect') === 1 ? 'checked' : '' }}>
                                                                Requer Orientação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="respect" value="2"
                                                                    {{ $instutional->getValue('respect') === 2 ? 'checked' : '' }}>
                                                                Requer Observação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="respect" value="3"
                                                                    {{ $instutional->getValue('respect') === 3 ? 'checked' : '' }}>
                                                                Bom
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="respect" value="4"
                                                                    {{ $instutional->getValue('respect') === 4 ? 'checked' : '' }}>
                                                                Ótimo
                                                            </label>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Autoestima (Valorização de si mesmo):</label><br>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="self_esteem" value="1"
                                                                    {{ $instutional->getValue('self_esteem') === 1 ? 'checked' : '' }}>
                                                                Requer Orientação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="self_esteem" value="2"
                                                                    {{ $instutional->getValue('self_esteem') === 2 ? 'checked' : '' }}>
                                                                Requer Observação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="self_esteem" value="3"
                                                                    {{ $instutional->getValue('self_esteem') === 3 ? 'checked' : '' }}>
                                                                Bom
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="self_esteem" value="4"
                                                                    {{ $instutional->getValue('self_esteem') === 4 ? 'checked' : '' }}>
                                                                Ótimo
                                                            </label>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Hábitos de Higiene(Cuidados pessoais):</label><br>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="habits" value="1"
                                                                    {{ $instutional->getValue('habits') === 1 ? 'checked' : '' }}>
                                                                Requer Orientação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="habits" value="2"
                                                                    {{ $instutional->getValue('habits') === 2 ? 'checked' : '' }}>
                                                                Requer Observação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="habits" value="3"
                                                                    {{ $instutional->getValue('habits') === 3 ? 'checked' : '' }}>
                                                                Bom
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="habits" value="4"
                                                                    {{ $instutional->getValue('habits') === 4 ? 'checked' : '' }}>
                                                                Ótimo
                                                            </label>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Cuidados com Meio Ambiente:</label><br>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="care" value="1"
                                                                    {{ $instutional->getValue('care') === 1 ? 'checked' : '' }}>
                                                                Requer Orientação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="care" value="2"
                                                                    {{ $instutional->getValue('care') === 2 ? 'checked' : '' }}>
                                                                Requer Observação
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="care" value="3"
                                                                    {{ $instutional->getValue('care') === 3 ? 'checked' : '' }}>
                                                                Bom
                                                            </label>
                                                            <label class="radio-inline mr-5">
                                                                <input type="radio" name="care" value="4"
                                                                    {{ $instutional->getValue('care') === 4 ? 'checked' : '' }}>
                                                                Ótimo
                                                            </label>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Data</label>
                                                            <input type="date" class="form-control" name="date"
                                                                id="date"
                                                                value="{{ $instutional->getValue('date') ? $instutional->getValue('date')->format('Y-m-d') : '' }}">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Ficha preenchida pelo (a):</label>
                                                            <select name="filled_by" tabindex="-1" data-other="4"
                                                                class="form-control select2 default-select change-other"
                                                                aria-hidden="true">
                                                                <option selected="selected" disabled="disabled"
                                                                    hidden="hidden" value=""
                                                                    {{ !$instutional->getValue('filled_by') ? 'selected' : '' }}>
                                                                    Selecione</option>
                                                                <option value="1"
                                                                    {{ $instutional->getValue('filled_by') === 1 ? 'selected' : '' }}>
                                                                    Pai</option>
                                                                <option value="2"
                                                                    {{ $instutional->getValue('filled_by') === 2 ? 'selected' : '' }}>
                                                                    Mãe</option>
                                                                <option value="3"
                                                                    {{ $instutional->getValue('filled_by') === 3 ? 'selected' : '' }}>
                                                                    Avó(ô)</option>
                                                                <option value="4"
                                                                    {{ $instutional->getValue('filled_by') === 4 ? 'selected' : '' }}>
                                                                    Outros</option>
                                                            </select>
                                                            <input type="text" class="form-control mt-2"
                                                                name="filled_by_other" id="filled_by_other"
                                                                value="{!! $instutional->getValue('filled_by_other') !!}"
                                                                style="{{ $instutional->getValue('filled_by') === 4 ? 'display:block' : 'display:none' }}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>{{ $instutional->questionText($key) }}</label>
                                                            <textarea rows="10" id="text" name="text" class="form-control">{!! $instutional->getValue('text') !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" class="btn btn-success float-right">
                                                                Salvar Pesquisa
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('js_after')
    <script type="text/javascript">
        $('select[name=select_when_date]').change(function(e) {
            alert("Atenção, você selecionou o ano de " + this.value + ", a página será recarregada.");

            return document.location = '?year=' + this.value;
        });

        $(document).on('change', 'select.change-other', function(e) {
            let ref_other = $(this).data('other');
            let content = $(this).closest('.form-group');
            let input = content.find('input[type=text]');
            if (parseInt(this.value) === ref_other) {
                input.css('display', 'block')
            } else {
                input.css('display', 'none');
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
    </script>
@endsection
