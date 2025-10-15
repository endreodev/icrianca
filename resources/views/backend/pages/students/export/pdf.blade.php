<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        html {
            margin: 10;
        }

        body {
            /* position: relative; */
        }

        @page {
            margin: 90px 25px;
        }

        header {
            top: -60px;
            left: 0px;
            right: 0px;
            /* height: 2cm; */
        }

        #footer {
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        div.page {
            page-break-after: always;
            position: relative;
        }

        div.page-last {
            page-break-after: never;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            border: 1px solid;
            font-size: 12px;
        }

        table td {
            width: 1%;
            border: 0;
            padding: 3px 5px;
            border: 1px solid;
            font-size: 11px;
            vertical-align: top;
        }

        table td span {
            font-weight: bold;
            font-size: 11px;
            margin-right: 5px;
        }

        .text-center {
            position: relative;
            text-align: center;
        }

        .title-header {
            font-family: tahoma;
            padding: 0;
            text-align: center;
            margin: 0;
        }

        .logo-header {
            width: auto;
            max-height: 80px;
        }

        .title-header span {
            vertical-align: middle;
        }

        .title-section {
            padding: 2px 10px;
            background: #b3b3b3;
            font-size: 12px;
        }

        .primary-table {
            margin-bottom: 10px;
        }

        .list {
            margin: 0;
            padding: 0;
        }

        .list li {
            list-style: none;
            margin: 1px 0;
        }
    </style>
</head>

<body>
    <header>
        <table style="border: 0!important">
            <tr>
                <td style="width: 20%; border: 0!important">

                </td>
                <td style="width: 60%; border: 0!important; vertical-align: middle;">
                    <h1 class="title-header"><span style="font-size: 20px!important">Ficha de Cadastro – Programa
                            Social IDC</span></h1>
                </td>
                <td style="width: 20%; border: 0!important">
                </td>
            </tr>
        </table>
    </header>
    <div>
        <div class="page-last">
            <h3 class="title-section">Dados Pessoais</h3>
            <table class="primary-table">
                <tbody>
                    <tr>
                        <td colspan="1" rowspan="4" align="center" vertical-align="middle">
                            {!! !empty($content->image)
                                ? '<img src="' .
                                    url('/') .
                                    $content->getImage('originals') .
                                    '" width="250" height="250" style=" object-fit: cover;" />'
                                : '<h4>FOTO</h4>' !!}
                        </td>
                        <td colspan="3">
                            <span>Nome do Aluno:</span>
                            {!! $content->getValue('name') !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Sexo:</span>
                            {!! $content->sex ? $content->sex->name : '' !!}
                        </td>
                        <td>
                            <span>Data de Nascimento:</span> {!! $content->getValue('birth_date') ? $content->getValue('birth_date')->format('d/m/Y') : '' !!}
                        </td>
                        <td>
                            <span>Programas:</span> <br>
                            @foreach ($content->registrations()->get() as $key => $value)
                                <span>{!! $value->program ? $value->program->name : '' !!}</span> <br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Naturalidade:</span>
                            {!! $content->nationality_city ? $content->nationality_city->name : '' !!}, {!! $content->nationality_state ? $content->nationality_state->name : '' !!}

                        </td>
                        <td colspan="2">
                            <span>Nacionalidade:</span>
                            {!! $content->nationality_country ? $content->nationality_country->name : '' !!}, {!! $content->nationality_country ? $content->nationality_country->initials : '' !!}
                            {{-- {!! $content->getValue('nationality_countries') !== null ? @$content->getValue('nationality_countries')->name : '' !!} --}}
                        </td>

                    </tr>
                    <tr>

                        <td style="border-right-style: none;">
                            <span>Polo:</span> <br>
                            @foreach ($content->registrations()->get() as $key => $value)
                                <span>{!! $value->unit ? $value->unit->name : '' !!}</span> <br>
                            @endforeach
                        </td>
                        <td colspan="2" style="border-left-style: none;">
                            <span>Turmas:</span> <br>
                            @foreach ($content->registrations()->get() as $key => $value)
                                <span>{!! $value->classe ? $value->classe->name : '' !!}</span> <br>
                            @endforeach
                        </td>



                    </tr>
                    <tr>
                        <td colspan="2">
                            <span>Endereço:</span> {!! $content->getValue('address') !!}
                        </td>
                        <td>
                            <span>Nº:</span> {!! $content->getValue('number') !!}
                        </td>
                        <td>
                            <span>Bairro:</span> {!! $content->getValue('district') !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Cidade:</span> {!! $content->getValue('city') !== null ? $content->city->name : '' !!}
                        </td>
                        <td>
                            <span>Estado:</span> {!! $content->getValue('state') !== null ? $content->state->name : '' !!}
                        </td>
                        <td>
                            <span>CEP:</span> {!! $content->getValue('zipcode') !!}
                        </td>
                        <td>
                            <span>Telefone residencial:</span> {!! $content->getValue('phone') !!}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <span>Filiação (nome do pai):</span> {!! $content->getValue('father_name') !!}
                        </td>
                        <td>
                            <span>Profissão:</span> {!! $content->getValue('father_office') !!}
                        </td>
                        <td>
                            <span>Celular:</span> {!! $content->getValue('father_phone') !!}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <span>Filiação (nome da mãe):</span> {!! $content->getValue('mother_name') !!}
                        </td>
                        <td>
                            <span>Profissão:</span> {!! $content->getValue('mother_office') !!}
                        </td>
                        <td>
                            <span>Celular:</span> {!! $content->getValue('mother_phone') !!}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            Em caso de Emergência os pais serão os primeiros a serem avisados, porém, teriam outros
                            contatos, caso não for possível falar com os pais?
                            <br><br>
                            <table>
                                @foreach ($content->getValue('contacts') as $value)
                                    <tr>
                                        <td style="border: 0!important">
                                            <span>Nome:</span> {!! $value->name !!}
                                        </td>
                                        <td style="border: 0!important">
                                            <span>Grau de Parentesco:</span> {!! $value->degree_of_kinship !!}
                                        </td>
                                        <td style="border: 0!important">
                                            <span>Fone: </span> {!! $value->phone !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <span>O aluno terá acompanhamente para ir na aula e voltar para casa?</span>
                            {!! $content->getValue('go_classes') ? $content->getValue('go_classes') : 'Irá sozinho' !!}
                        </td>

                    </tr>
                </tbody>
            </table>
            <h3 class="title-section">Dados Escolares</h3>
            <table class="primary-table">
                <thead>
                    <tr>
                        <th align="center">
                            Ensino
                        </th>
                        <th align="center">
                            Ano Letivo
                        </th>
                        <th align="center">
                            Escola
                        </th>
                        <th align="center">
                            Ano Escolar
                        </th>
                        <th align="center">
                            Turma
                        </th>
                        <th align="center">
                            Período
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content->getValue('schools') as $value)
                        <tr>
                            <td align="center">{!! $value->getTeaching() !!}</td>
                            <td align="center">{!! $value->academic_year !!}</td>
                            <td align="center">{!! $value->school !== null ? $value->school->name : ' ' !!}</td>
                            <td align="center">{!! $value->school_year->name !!}</td>
                            <td align="center">{!! $value->classe !!}</td>
                            <td align="center">{!! $value->getPeriod() !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3 class="title-section">Aferições de Peso e Altura</h3>
            <table class="primary-table">
                <thead>
                    <tr>
                        <th align="center">
                            Data
                        </th>
                        <th align="center">
                            Peso
                        </th>
                        <th align="center">
                            Altura
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content->getValue('measurements') as $value)
                        <tr>
                            <td align="center">{!! $value->date ? $value->date->format('d/m/Y') : '' !!}</td>
                            <td align="center">{!! $value->weight !!}</td>
                            <td align="center">{!! $value->height !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3 class="title-section">Dados de Atenção á Saúde</h3>
            <table class="primary-table">
                <tbody>
                    <tr>
                        <td colspan="2">
                            <span>Possui Alergia?</span> {!! $content->getValue('has_allergy') !!} <br>
                            @if (!empty($content->getValue('what_allergy')))
                                <span>Qual:</span> {!! $content->getValue('what_allergy') !!}
                            @endif
                        </td>
                        <td colspan="2">
                            <span>Toma medicamento controlado?</span> {!! $content->getValue('has_controlled_medication') ? $content->getValue('has_controlled_medication') : 'Não' !!} <br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <span>Já fez alguma cirurgia?</span> {!! $content->getValue('had_surgery') ? $content->getValue('had_surgery') : 'Não' !!} <br>

                        </td>
                        <td colspan="2">
                            <span>Tem plano de saúde?</span> {!! $content->getValue('has_health_plan') ? $content->getValue('has_health_plan') : 'Não' !!} <br>
                        </td>
                    </tr>
                </tbody>
            </table>
            @if (!empty($content->getValue('has_comments_health')))
                <h3 class="title-section">Recomendações sobre a saúde ou comportamento a serem observados na aula</h3>
                <table class="primary-table">
                    <tbody>
                        <tr>
                            <td>
                                {!! !empty($content->getValue('has_comments_health'))
                                    ? $content->getValue('has_comments_health')
                                    : '<br><br><br><br>' !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endif
            <h3 class="title-section">Observações</h3>
            <table class="primary-table">
                <tbody>

                    <tr>
                        <td>
                            Ao realizar a matrícula apresentou-se os seguintes documentos: <br>
                            <table style="margin-top: 10px; margin-bottom: 10px">
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $content->getValue('responsible_document') ? 'Cópia do RG / CPF do Responsável' : '' }}
                                        </td>
                                        <td>
                                            {{ $content->getValue('certificate_birth') ? 'Cópia da Cert. de Nac. ou RG do adolescente' : '' }}

                                        </td>
                                        <td>
                                            {{ $content->getValue('certificate_of_schooling') ? 'Atestado de Escolaridade' : '' }}

                                        </td>
                                        <td>
                                            {{ $content->getValue('certificate_medical') ? 'Atestado Médico' : '' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h3 class="title-section">Anotações</h3>

            <table>
                @foreach ($content->getValue('annotations') as $value)
                    <tr>
                        <td style="border: 0 !important;">
                            <span>Data: {!! $value->date ? $value->date->format('d/m/Y') : '' !!} <br> Titulo:
                                {!! $value->title !!}</span><br>
                            {!! strip_tags($value->text) !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            <br>
            <br>
            <br>
            <div style="font-size: 14px;">
                {{ isset($document->footer)
                    ? $document->footer
                    : 'Confirmo a atualização dos dados cadastrais desta ficha e estou ciente das anotações de participação do
                                                                                                                                                                                                                                                                                                                meu filho(a) no Programa.' }}


                <br><br><br>
                Data:__/__/_____ <br><br>
                Nome:_________________________________________________<br><br>
                Pai( ) Mãe( ) Outros( )____________________________________ <br><br><br><br><br>

            </div>
            <div class="text-center">
                ________________________________________________________<br>
                <p style="font-size: 10px;">Assinatura</p>
            </div>
        </div>
    </div>
</body>

</html>
