@extends('layouts.main', ['sidebar' => 'Administrators'])

@section('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
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
                        @if ( isset($administrator) )
                            <h1>Editar administrador</h1>
                        @else
                            <h1>Agregar un nuevo administrador</h1>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        @if ( isset($administrator) )
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('administrators.index') }}">Administradores</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('administrators.show', $administrator) }}">{{ $administrator->name }}</a></li>
                                <li class="breadcrumb-item active">Editar administrador</li>
                            </ol>
                        @else
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('administrators.index') }}">Administradores</a></li>
                                <li class="breadcrumb-item active">Crear administrador</li>
                            </ol>
                        @endif
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
                                @if ( isset($administrator) )
                                    <form action=" {{ route('administrators.update', $administrator) }}" method="POST">
                                    @method('PUT')
                                @else
                                    <form action=" {{ route('administrators.store') }}" method="POST">
                                @endif
                                    @csrf
                                    <h6 class="d-flex @error('name') text-danger @enderror">Nombre</h6>
                                    <div class="form-group ">
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Ingrese el nombre completo del nuevo administrador" value="{{ old('name') ?? ($administrator->name ?? '') }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    @if ( !isset($administrator) )
                                        <h6 class="d-flex @error('email') text-danger @enderror">Correo electrónico</h6>
                                        <div class="form-group ">
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Ingrese el correo electrónico del nuevo administrador" value="{{ old('email') ?? ($administrator->user->email ?? '') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <h6 class="d-flex @error('password') text-danger @enderror">Contraseña</h6>
                                        <div class="form-group ">
                                            <input type="password" name="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Ingrese la contraseña de acceso del nuevo administrador" value="{{ old('password') ?? ($administrator->user->password ?? '') }}">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-outline-primary btn-block">
                                                <strong>
                                                    @if ( isset($administrator) )
                                                        ACTUALIZAR
                                                    @else
                                                        GUARDAR
                                                    @endif
                                                </strong>
                                            </button>
                                        </div>
                                        <div class="col-3"></div>
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
    <script src="{{ asset('js/adminlte.js') }}"></script>
@endsection
