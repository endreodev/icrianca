@extends('backend.layouts.app')

@section('css_before')
<!-- Datatable -->
<link href="{{ asset('public') }}/backend/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('title-module', $title)

@section('inner')
<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Listar</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{!! \Lang::choice('tables.reports', 'p') !!}</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-12">
            @include('backend.layouts.alerts')
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Listagem de {!! \Lang::choice('tables.reports', 'p') !!}</h4>
                    <a href="{{route($route . '.create')}}" class="btn light btn-secondary">Novo {!! \Lang::choice('tables.reports', 's') !!}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-index" class="display min-w850">
                            <thead>
                                <tr>
                                    {!!$columns->table!!}
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

@section('js_after')
<!-- Datatable -->
<script src="{{ asset('public') }}/backend/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('public') }}/backend/js/plugins-init/datatables.init.js"></script>

<script type="text/javascript">
    $(function () {
      var table = $('#table-index').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route( $route . '.index') }}",
          order: [ [0, 'desc'] ],
          columns: {!!$columns->js!!},
          "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"},
      });
    });
     
</script>

@endsection