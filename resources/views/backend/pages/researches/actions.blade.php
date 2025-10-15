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
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{ route('backend.' . $path . '.show', [$row->getId()]) }}">
            Ver Pesquisa
        </a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#print-{{ $row->getId() }}">
            Imprimir
        </a>
    </div>
</div>


{{-- Modals --}}
<div class="modal fade" id="print-{{ $row->getId() }}">
    <div class="modal-dialog modal-dialog-centered bd-example-modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('backend.' . $path . '.print', [$row->getId()]) }}" method="GET">
                <div class="modal-header">
                    <h5 class="modal-title">Imprimir Pesquisa de {!! $row->name !!}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label>Selecione o Ano de Referencia</label>
                        <select name="year" class="form-control select2">
                            @foreach (range(date('Y'), 2000) as $key => $item)
                                <option value={{ $item }}>
                                    {!! $item !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success light">Imprimir</button>
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
