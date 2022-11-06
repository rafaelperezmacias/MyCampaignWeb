@extends('layouts.main')

@section('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Información del voluntario</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('volunteers.index') }}">Campañas</a></li>
                            <li class="breadcrumb-item active">{{$volunteer->name}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Default box -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <h1><a href="{{route('volunteers.edit', [$volunteer->id])}}" type="reset" class="btn btn-outline-primary align-bottom pl-5 pr-5">Editar</a></h1>
                                    </div>
                                </div>
                                <form action=" {{ route('volunteers.store') }}" method="POST">
                                    @csrf
                                    <h6 class="d-flex">Nombre(s)</h6>
                                    <div class="form-group ">
                                        <input type="text" name="name" id="name"
                                            class="form-control"
                                            placeholder="Ingrese el nombre de la campaña" value="{{$volunteer->name}}" disabled="">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Apellido paterno</h6>
                                            <div class="form-group">
                                                <input type="text" name="fathers_lastname" id="fathers_lastname"
                                                    class="form-control"
                                                    placeholder="Ingrese el apellido paterno" value="{{$volunteer->fathers_lastname}}" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Apellido materno</h6>
                                            <div class="form-group">
                                                <input type="text" name="mothers_lastname" id="mothers_lastname"
                                                    class="form-control"
                                                    placeholder="Ingrese el apellido materno" value="{{$volunteer->mothers_lastname}}" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="d-flex">Fecha de nacimiento</h6>
                                    <div class="form-group ">
                                        <input type="date" name="fathers_lastname" id="fathers_lastname"
                                            class="form-control"
                                            placeholder="Ingrese la fecha de nacimiento"
                                            value="{{$volunteer->fathers_lastname}}" disabled="">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5"></div>
                    <!-- /.card-footer-->
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
@endsection
