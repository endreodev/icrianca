@if (Session::has('alert'))
<div class="alert alert-{!!session('alert.code')!!} alert-dismissible fade show">
    {!!session('alert.icon')!!}
    <strong>{!!session('alert.strong')!!}</strong> {!!session('alert.message')!!}
    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
        <span><i class="mdi mdi-close"></i></span>
    </button>
</div>
@endif

@if ($errors->any())

<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span>
            <i class="mdi mdi-close"></i>
        </span>
    </button>
    <div class="media">
        <div class="media-body">
            <h5 class="mt-1 mb-1">Atenção, corriga os erros abaixo.</h5>
            <div>
                <ul class="list-unstyled m-0 mt-4">
                    @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif