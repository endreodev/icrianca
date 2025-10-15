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
        <a class="dropdown-item" href="{{ route('backend.users.show', [$row->getId()]) }}">
            Editar
        </a>
        <a class="dropdown-item" href="{{ route('backend.users.record', [$row->getId()]) }}">
            Imprimir ficha do Colaborador
        </a>
        @if ($row->status === 3)
            <a class="dropdown-item" href="{{ route('backend.users.send-link', [$row->getId()]) }}">
                Enviar Link de Acesso
            </a>
        @endif
        @if ($row->status === 1)
            <a class="dropdown-item text-danger" href="{{ route('backend.users.status', [$row->getId()]) }}">
                Desativar
            </a>
        @elseif($row->status === 2)
            <a class="dropdown-item text-success" href="{{ route('backend.users.status', [$row->getId()]) }}">
                Ativar
            </a>
        @endif
        <a class="dropdown-item text-danger" href="{{ route('backend.users.delete', [$row->getId()]) }}">Apagar</a>
    </div>
</div>
