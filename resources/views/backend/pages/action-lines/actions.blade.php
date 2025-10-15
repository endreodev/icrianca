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
        <a class="dropdown-item" href="{{route($route.'.show', [$row->getId()])}}">
            Editar
        </a>
        @if($row->status)
        <a class="dropdown-item text-danger" href="{{route($route.'.status', [$row->getId()])}}">
            Desativar
        </a>
        @else
        <a class="dropdown-item text-success" href="{{route($route.'.status', [$row->getId()])}}">
            Ativar
        </a>
        @endif
        <a class="dropdown-item text-danger" href="{{route($route.'.delete', [$row->getId()])}}">Apagar</a>
    </div> 
</div>