<div class="dropdown custom-dropdown mb-0">
    <div class="btn sharp btn-primary tp-btn" data-toggle="dropdown">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
            viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24" />
                <circle fill="#000000" cx="12" cy="5" r="2" />
                <circle fill="#000000" cx="12" cy="12" r="2" />
                <circle fill="#000000" cx="12" cy="19" r="2" />
            </g>
        </svg>
    </div>
    @php
        $parms = '?';
        
        $parms .= request()->type ? 'type=' . request()->type . '&' : '';
        $parms .= request()->name ? 'name=' . request()->name . '&' : '';
        $parms .= request()->age ? 'age=' . request()->age . '&' : '';
        $parms .= request()->sex ? 'sex=' . request()->sex . '&' : '';
        $parms .= request()->unit ? 'unit=' . request()->unit . '&' : '';
        $parms .= request()->program ? 'program=' . request()->program . '&' : '';
        $parms .= request()->class ? 'class=' . request()->class . '&' : '';
        $parms .= request()->status ? 'status=' . request()->status . '&' : '';
        $parms .= request()->birth_date ? 'birth_date=' . request()->birth_date . '&' : '';
        $parms .= request()->birth_date_day ? 'birth_date_day=' . request()->birth_date_day . '&' : '';
        $parms .= request()->birth_date_month ? 'birth_date_month=' . request()->birth_date_month . '&' : '';
        $parms .= request()->footer ? 'footer=' . request()->footer . '&' : '';

        $parms = '?return='. Illuminate\Support\Facades\Crypt::encrypt($parms);
        
    @endphp
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item text-dark" href="{{ route('backend.' . $path . '.show', [$row->getId()]) . $parms }}">
            Editar
        </a>
        <a class="dropdown-item text-dark" href="#" data-toggle="modal"
            data-target="#emergency-{{ $row->getId() }}">Contatos de Emergencia</a>
        @if ($row->status === 1)
            <a class="dropdown-item text-dark" href="{{ route('backend.' . $path . '.status', [$row->getId()]) }}">
                Desativar
            </a>
        @elseif($row->status === 2)
            <a class="dropdown-item text-dark" href="{{ route('backend.' . $path . '.status', [$row->getId()]) }}">
                Ativar
            </a>
        @endif



        <a class="dropdown-item text-dark" href="#" data-toggle="modal"
            data-target="#generate-record-{{ $row->getId() }}">
            Imprimir Ficha
        </a>
        <a class="dropdown-item text-dark transfer-action" href="#" data-toggle="modal"
            data-target="#transfer-{{ $row->getId() }}">
            Transferir
        </a>
        <a class="dropdown-item text-danger" href="{{ route('backend.' . $path . '.delete', [$row->getId()]) }}">
            Apagar
        </a>
    </div>
</div>

{{-- Modals --}}
<div class="modal fade" id="generate-record-{{ $row->getId() }}">
    <div class="modal-dialog modal-dialog-centered bd-example-modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('backend.' . $path . '.record', [$row->getId()]) }}" method="GET">
                <div class="modal-header">
                    <h5 class="modal-title">Imprimir ficha de {!! $row->name !!}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label>Rodapé do Documento</label>

                        <textarea class="form-control" rows="6" style="color: black; font-size:14pt" name="footer"
                            placeholder="Confirmo a atualização ....">Confirmo a atualização dos dados cadastrais desta ficha e estou ciente das anotações de participação do meu filho(a) no Programa.</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success light">Gerar</button>
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="emergency-{{ $row->getId() }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contatos de Emergencia de {!! $row->name !!}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul>
                    @foreach ($row->contacts()->orderBy('created_at', 'ASC')->get() as $key => $value)
                        <li>
                            <b>Nome:</b> {!! $value->name !!} | {!! $value->degree_of_kinship !!} <br>
                            <b>Telefone:</b> {!! $value->phone !!} <br>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-transfer" id="transfer-{{ $row->getId() }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('backend.students.transfer', [$row->getId()]) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Transferir Aluno </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">

                        <div class="form-group">
                            <label>Selecione o Polo:</label>
                            <select name="unit_id" class="form-control select2">
                                @foreach ($units->whereNotIn(
        'id',
        $row->registrations()->where('status', '=', '1')->get()->pluck('unit_id')->toArray(),
    ) as $key => $unit)
                                    <option value="{{ $unit->getId() }}">{!! $unit->name !!}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning light">Transferir</button>
                    <button type="button" class="btn btn-dark light" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
