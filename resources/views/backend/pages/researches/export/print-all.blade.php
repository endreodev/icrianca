<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Estudo de Perfil - Programa Social IDC</title>
    <style>
        body {
            position: relative;
        }

        @page {
            margin: 90px 25px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        footer {
            position: fixed;
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
            font-size: 12px;
            vertical-align: top;
        }

        table td span {
            font-weight: bold;
            font-size: 12px;
            margin-right: 5px;
        }

        .text-center {
            position: relative;
            text-align: center;
        }

        .title-header {
            margin-top: 0;
            padding-top: 0;
            font-family: tahoma;
            text-align: center;
            font-size: 18px;
            text-decoration: underline;
        }

        header img {
            width: auto;
            height: auto;
            max-height: 40px;
        }

        header td {
            vertical-align: middle;
        }

        .title-section {
            padding: 2px 10px;
            font-size: 12px;
            text-align: center;
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

        .info {
            font-size: 10px;
        }
    </style>
</head>

<body>
    @foreach ($researches as $key => $recordResearch)
        <header>
            <table>
                <tbody>
                    <tr>
                        <td style="border:0 !important;">
                            {!! img('children.jpg') !!}
                        </td>
                        <td style="border:0 !important;">
                            <h1 class="title-header"><span>ESTUDO DE PERFIL <br> Programa Social IDC</span></h1>
                        </td>
                        <td style="border:0 !important; text-align: right;">
                            {!! img('logo-header.png') !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </header>
        <div>
            <div {!! $key + 1 == $researches->count() ? 'class="page-last"' : 'class="page"' !!}>
                <table border="0">
                    <tbody>
                        <tr>
                            <td colspan="2" style="border:0 !important;">
                                <span>Aluno (a): </span> {!! $recordResearch->students->name !!}
                            </td>
                            <td style="border:0 !important;">
                                <span>Sexo:</span> {!! $recordResearch->students->sexe->name !!}
                            </td>
                            <td style="border:0 !important;">
                                <span>Idade:</span> {!! $recordResearch->students->age() !!}
                            </td>
                            <td style="border:0 !important;">
                                <span>Ano de Referência:</span> {!! $recordResearch->year !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <span>1 - Quando começou a participar do programa:</span> {!! $recordResearch->when_did_you_start_program !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span>2 - Como ficou sabendo do programa:</span> {!! $recordResearch->how_did_you_program() !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span>3 - O que levou a participar do programa:</span> {!! $recordResearch->what_led_to_program() !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>4 - Já parou de estudar alguma vez? </span> {!! $recordResearch->have_you_ever_stopped_studying() !!}
                            </td>
                            <td>
                                <span>Em qual ano: </span> {!! $recordResearch->in_what_year !!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>5 - Precisou de reforço escolar: </span> {!! $recordResearch->did_you_need_tutoring() !!}
                            </td>
                            <td>
                                <span>Teve dificuldade com o aprendizado: </span> {!! $recordResearch->had_difficulty_learning() !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span>6 - Situação familiar:</span> {!! $recordResearch->what_is_the_family_situation() !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span>7 - Com quem a criança mora atualmente:</span> {!! $recordResearch->with_currently_lives() !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span>8 - Quantidade de pessoas da família morando na mesma casa:</span>
                                {!! $recordResearch->how_many_people_same_household() !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span>9 - Quando não está na escola, com quem a criança fica? </span>
                                {!! $recordResearch->when_you_child_stay() !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span>10 - Condições de moradia: </span> {!! $recordResearch->what_living_conditions() !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span>11 - Seu filho tem perfil em alguma rede social (Facebook, WhatsApp,
                                    Instagram):</span> {!! $recordResearch->your_child_has_social_network() !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span>12 - Principal meio de acesso à internet: </span> {!! $recordResearch->what_is_accessing_the_internet() !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span>13 - Principal meio de transporte da família: </span> {!! $recordResearch->what_family_means_of_transportation() !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span>14 - Grau de escolaridade de quem está respondendo esta pesquisa: </span>
                                {!! $recordResearch->level_of_education() !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
                @foreach ($recordResearch->institutional_research as $key => $value)
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <h1 class="title-section">{!! $key + 1 !!}ª Pesquisa Institucional</h1>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td style="border: 0 !important;">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th align="center">
                                                                    Item
                                                                </th>
                                                                <th align="center">
                                                                    Requer Orientação
                                                                </th>
                                                                <th align="center">
                                                                    Requer observação
                                                                </th>
                                                                <th align="center">
                                                                    Bom
                                                                </th>
                                                                <th align="center">
                                                                    Ótimo
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <span>Interesse em estudar</span>
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->interest_in_studying == 1 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->interest_in_studying == 2 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->interest_in_studying == 3 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->interest_in_studying == 4 ? 'X' : '' !!}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <span>Comportamento</span>
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->behavior == 1 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->behavior == 2 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->behavior == 3 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->behavior == 4 ? 'X' : '' !!}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <span>Responsabilidade</span>
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->responsibility == 1 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->responsibility == 2 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->responsibility == 3 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->responsibility == 4 ? 'X' : '' !!}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <span>Respeito</span>
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->respect == 1 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->respect == 2 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->respect == 3 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->respect == 4 ? 'X' : '' !!}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <span>Autoestima</span>
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->self_esteem == 1 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->self_esteem == 2 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->self_esteem == 3 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->self_esteem == 4 ? 'X' : '' !!}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <span>Hábitos de Higiene</span>
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->habits == 1 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->habits == 2 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->habits == 3 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->habits == 4 ? 'X' : '' !!}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <span>Cuidados com Meio Ambiente</span>
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->care == 1 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->care == 2 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->care == 3 ? 'X' : '' !!}
                                                                </td>
                                                                <td align="center"
                                                                    style="vertical-align: middle !important;">
                                                                    {!! $value->care == 4 ? 'X' : '' !!}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="border: 0 !important;">
                                                    <span style="display: block; text-align: center;">Como o programa
                                                        pode ajudar seu filho?</span>
                                                    {!! $value->text !!}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0">
                        <tbody>
                            <tr>
                                <td>
                                    <span>Data:</span> {!! $value->date != null ? date('d/m/Y', strtotime($value->date)) : '' !!}
                                </td>
                                <td>
                                    <span>Ficha preenchida pelo (a):</span> {!! $value->file_completed() !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    @endforeach
</body>

</html>
