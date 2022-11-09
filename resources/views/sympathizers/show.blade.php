@extends('layouts.main', ['sidebar' => 'Administrators'])

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
                        <h1>Información del simpatizante</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('sympathizers.index') }}">Simpatizantes</a></li>
                            <li class="breadcrumb-item active"> {{ $sympathizer->name }} </li>
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
                                    <div class="col-6 text-left">
                                        <h1>
                                            <a>
                                            <form action="{{ route('sympathizers.destroy', [$sympathizer]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger align-bottom pl-5 pr-5">Borrar</button>
                                            </form>
                                            </a>
                                        </h1>
                                    </div>
                                    <div class="col-6 text-right">
                                        <h1>
                                            <a href="{{route('sympathizers.edit', [$sympathizer])}}"
                                                class="btn btn-outline-primary align-bottom pl-5 pr-5">
                                                Editar
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                                <h6 class="d-flex">Nombre</h6>
                                <div class="form-group">
                                    <input type="text" name="name" id="name"
                                        class="form-control"
                                        placeholder="Ingrese el nombre completo del nuevo simpatizante" value="{{ $sympathizer->name }}"
                                        disabled>
                                </div>
                                <h6 class="d-flex">Correo electrónico</h6>
                                <div class="form-group">
                                    <input type="email" name="email" id="email"
                                        class="form-control"
                                        placeholder="Ingrese el correo electrónico del nuevo simpatizante" value="{{ $sympathizer->user->email }}"
                                        disabled>
                                </div>
                                <h6 class="d-flex">Contraseña</h6>
                                <div class="form-group ">
                                    <input type="password" name="password" id="password"
                                        class="form-control"
                                        placeholder="Ingrese la contraseña de acceso del nuevo simpatizante" value="{{ $sympathizer->user->password }}"
                                        disabled>
                                </div>
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
    <script src="{{ asset('js/adminlte.js') }}"></script>
@endsection
