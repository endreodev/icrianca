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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

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
            font-size: 10pt;
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

        table td {
            vertical-align: middle;
        }

        table td {
            width: auto;
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
                    <h1 class="title-header"><span style="font-size: 20px!important">Ficha de Colaborador</span></h1>
                </td>
                <td style="width: 20%; border: 0!important">
                </td>
            </tr>
        </table>
    </header>

    <p dir="ltr"
        style="background: silver;padding: 15px;font-family: monospace;font-weight: bold;margin: 0;margin-top: 10px;">
        Dados Pessoais
    </p>
    <div dir="ltr" align="right">
        <table>
            <tbody>
                <tr>
                    <td colspan="3">
                        <p dir="ltr">
                            <b>Nome:</b> {!! $content->full_name !!}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Sexo:</b> {{ $content->sex ? $content->sex->name : '' }}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Data admiss&#227;o:</b>
                            {{ $content->getValue('admission_date') ? $content->getValue('admission_date')->format('d/m/Y') : '' }}
                        </p>
                        <br />
                    </td>
                </tr>
                <tr>
                    {{-- <td colspan="2">
                        <p dir="ltr">
                            Filia&#231;&#227;o:
                        </p>
                        <br />
                    </td> --}}
                    <td colspan="4">
                        <p dir="ltr">
                            <b>Data de Nasc:</b> {!! $content->getValue('birth_date') ? $content->getValue('birth_date')->format('d/m/Y') : '' !!}
                        </p>
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Naturalidade:</b> {!! $content->city ? $content->city->name : '' !!}, {!! $content->state ? $content->state->name : '' !!}
                        </p>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p dir="ltr">
                            <b>Endere&#231;o:</b> {!! $content->getValue('address') !!}
                        </p>
                        <br />
                    </td>
                    <td colspan="2">
                        <p dir="ltr">
                            <b> Bairro:</b> {!! $content->getValue('district') !!}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Cidade:</b> {{ $content->getValue('city') ? $content->getValue('city')->name : '' }}
                        </p>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <p dir="ltr">
                            <b>Fone:</b> {!! $content->getValue('cellphone') !!}
                        </p>
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <p dir="ltr">
                            <b>E-mail:</b> {!! $content->getValue('email') !!}
                        </p>
                    </td>
                    <td colspan="3">
                        <p dir="ltr">
                            <b>Cargo e/ou fun&#231;&#227;o na institui&#231;&#227;o:</b>
                            {{ $content->getValue('office') ? $content->getValue('office')->name : '' }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <p dir="ltr">
                            Cor declarada:
                        </p>
                        <p dir="ltr">
                            ( {{ $content->getValue('declared_color') === 'indigenous' ? 'x' : '' }} ) Ind&#237;gena
                            ( {{ $content->getValue('declared_color') === 'white' ? 'x' : '' }} ) Branca
                            ( {{ $content->getValue('declared_color') === 'black' ? 'x' : '' }} ) Negra
                            ( {{ $content->getValue('declared_color') === 'yellow' ? 'x' : '' }} ) Amarela
                            ( {{ $content->getValue('declared_color') === 'brown' ? 'x' : '' }} ) Parda
                            ( {{ $content->getValue('declared_color') === 'not_informed' ? 'x' : '' }} ) N&#227;o
                            Informada
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <p dir="ltr">
                            <b>Estado Civil:</b>
                        </p>
                        <p dir="ltr">
                            ( {{ $content->getValue('marital_status') === 'single' ? 'x' : '' }} ) Solteiro
                            ( {{ $content->getValue('marital_status') === 'married' ? 'x' : '' }} ) Casado
                            ( {{ $content->getValue('marital_status') === 'divorced' ? 'x' : '' }} ) Divorciado
                            ( {{ $content->getValue('marital_status') === 'widower' ? 'x' : '' }} ) Vi&#250;vo

                            @php
                                $arr = ['widower', 'divorced', 'married', 'single'];
                            @endphp

                            (
                            {{ !in_array($content->getValue('marital_status'), $arr) && $content->getValue('marital_status') ? 'x' : '' }}
                            ) Outro:
                            {{ !in_array($content->getValue('marital_status'), $arr) ? $content->getValue('marital_status') : '' }}
                        </p>
                        <p dir="ltr">
                            <b>Nome C&#244;njuge:</b> {!! $content->getValue('spouse_name') !!}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        @php
                            $children = $content->getValue('children');
                            
                            $children_array = [];
                            
                            foreach ($children as $key => $value) {
                                if ($value['name'] !== null) {
                                    $childrens = true;
                                    $children_array[$key] = $value;
                                } else {
                                    $childrens = false;
                                }
                            }
                            
                        @endphp
                        <p dir="ltr">
                            FILHOS: ( {{ $childrens ? 'X' : '' }} ) sim ( {{ !$childrens ? 'X' : '' }} ) n&#227;o
                        </p>
                        @foreach ($children_array as $key => $item)
                            <p dir="ltr">
                                <b>Nome:</b> {!! $item['name'] !!} | <b>Nascimento:</b> {!! $item['birthday'] !!} |
                                <b>CPF:</b> {!! $item['document'] !!}
                            </p>
                        @endforeach


                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <p dir="ltr"
        style="background: silver;padding: 15px;font-family: monospace;font-weight: bold;margin: 0;margin-top: 10px;">
        Documenta&#231;&#227;o:
    </p>
    <div dir="ltr" align="right">
        <table>
            <colgroup>
                <col width="260" />
                <col width="89" />
                <col width="57" />
                <col width="49" />
                <col width="47" />
                <col width="95" />
                <col width="139" />
            </colgroup>
            <tbody>
                <tr>
                    <td>
                        <p dir="ltr">
                            <b>CPF:</b> {!! $content->getValue('document') !!}
                        </p>
                        <br />
                    </td>
                    <td colspan="3">
                        <p dir="ltr">
                            <b>RG:</b> {!! $content->getValue('rg') !!}
                        </p>
                        <br />
                    </td>
                    <td colspan="2">
                        <p dir="ltr">
                            <b>Local de Emiss&#227;o:</b> {!! $content->getValue('rg_place_of_issue') !!}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Data de Emiss&#227;o:</b>
                            {{ $content->getValue('rg_issue_date') ? $content->getValue('rg_issue_date')->format('d/m/Y') : '' }}
                        </p>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p dir="ltr">
                            <b>Carteira de Trabalho:</b> {!! $content->getValue('work_card') !!}
                        </p>
                        <br />
                    </td>
                    <td colspan="2">
                        <p dir="ltr">
                            <b>S&#233;rie:</b> {!! $content->getValue('work_card_series') !!}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Est. Emissor:</b> {!! $content->getValue('work_card_issuing_state') !!}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Data de Emiss&#227;o:</b>
                            {{ $content->getValue('work_card_issuing_date') ? $content->getValue('work_card_issuing_date')->format('d/m/Y') : '' }}
                        </p>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p dir="ltr">
                            <b>T&#237;tulo de Eleitor:</b> {!! $content->getValue('voters_title') !!}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Zona:</b> {!! $content->getValue('voters_title_zone') !!}
                        </p>
                        <br />
                    </td>
                    <td colspan="2">
                        <p dir="ltr">
                            <b>Se&#231;&#227;o:</b> {!! $content->getValue('voters_title_section') !!}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Estado:</b> {!! $content->getValue('voters_title_state') !!}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Data de Emiss&#227;o:</b>
                            {{ $content->getValue('voters_title_issue_date') ? $content->getValue('voters_title_issue_date')->format('d/m/Y') : '' }}
                        </p>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p dir="ltr">
                            <b>Certif. Reservista:</b> {!! $content->getValue('reservist_certificate') !!}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>S&#233;rie:</b> {!! $content->getValue('reservist_certificate_series') !!}
                        </p>
                    </td>
                    <td colspan="2">
                        <p dir="ltr">
                            <b>Categoria:</b> {!! $content->getValue('reservist_certificate_category') !!}
                        </p>
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>RM:</b> {!! $content->getValue('reservist_certificate_rm') !!}
                        </p>
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Data de Emiss&#227;o:</b>
                            {{ $content->getValue('reservist_certificate_issue_date') ? $content->getValue('reservist_certificate_issue_date')->format('d/m/Y') : '' }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p dir="ltr">
                            <b>Pis /Pasep:</b> {!! $content->getValue('pis_pasep') !!}
                        </p>
                        <br />
                    </td>
                    <td colspan="4">
                        <p dir="ltr">
                            <b>CNH /Cart. Motorista:</b> {!! $content->getValue('cnh') !!}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Categoria:</b> {!! $content->getValue('cnh_category') !!}
                        </p>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p dir="ltr">
                            <b>Registro em &#243;rg&#227;o de Classe (Cref): n&#186;</b> {!! $content->getValue('class_body_registration') !!}
                        </p>
                    </td>
                    <td colspan="4">
                        <p dir="ltr">
                            <b>&#211;rg&#227;o emissor:</b> {!! $content->getValue('class_body_registration_issuing_body') !!}
                        </p>
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Validade:</b> {!! $content->getValue('class_body_registration_validaty') !!}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p dir="ltr">
                            <b>Banco / Tipo de conta:</b> {!! $content->getValue('bank') !!} / {!! $content->getValue('bank_type') !!}
                        </p>
                        <br />
                    </td>
                    <td colspan="4">
                        <p dir="ltr">
                            <b>Ag&#234;ncia:</b> {!! $content->getValue('bank_ag') !!}
                        </p>
                        <br />
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Conta corrente:</b> {!! $content->getValue('bank_ac') !!}
                        </p>
                        <br />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <p dir="ltr"
        style="background: silver;padding: 15px;font-family: monospace;font-weight: bold;margin: 0;margin-top: 10px;">
        Instru&#231;&#227;o:
    </p>
    <div dir="ltr" align="right">
        <table>
            <tbody>
                <tr>
                    <td colspan="3">
                        <p dir="ltr">
                            <b>Grau de instru&#231;&#227;o:</b> {!! $content->getValue('education_level') !!}
                        </p>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td>
                        <p dir="ltr">
                            <b>Curso:</b> {!! $content->getValue('education_course') !!}
                        </p>
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Estabelecimento:</b> {!! $content->getValue('education_establishment') !!}
                        </p>
                    </td>
                    <td>
                        <p dir="ltr">
                            <b>Conhece outros idiomas?</b> {!! $content->getValue('know_other_languages') !!}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
