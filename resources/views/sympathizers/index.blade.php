@extends('layouts.main', ['sidebar' => 'Sympathizers'])

@section('css')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Simpatizantes de la campaña</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Simpatizantes</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <h1><a href="{{ route('sympathizers.create') }}" type="reset" class="btn btn-outline-primary align-bottom pl-5 pr-5">Agregar simpatizante</a></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card mr-2 ml-2">
            <div class="card-body">
                <table class="table table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sympathizers as $sympathizer)
                        <tr>
                            <td>
                                {{ $sympathizer->name }}
                                @if ($sympathizer->authorized)
                                    <small class="badge badge-primary"><i class="fas fa-check"></i> Autorizado </small>
                                @else
                                    <small class="badge badge-secondary"><i class="fas fa-times"></i> Sin autorizar </small>
                                @endif

                            </td>
                            <td> {{ $sympathizer->user->email }} </td>
                            <td>
                                <form action="{{ route('sympathizers.destroy', [$sympathizer]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('sympathizers.show', $sympathizer) }}" class="btn-sm btn-outline-success icon icon-left pt-2">
                                        <i class="fas fa-search"></i> Detalles
                                    </a>
                                    <button type="submit"  class="btn-sm btn-outline-danger icon icon-left pt-2 border-0">
                                        <i class="fas fa-eraser"></i> Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
