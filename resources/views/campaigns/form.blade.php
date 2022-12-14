@extends('layouts.main', ['sidebar' => 'Campaing'])

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
                        @if (isset($campaign))
                            <h1>Actualizar campaña</h1>
                        @else
                            <h1>Agregar una nueva campaña</h1>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        @if (isset($campaign))
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('campaigns.index') }}">Campañas</a></li>
                                <li class="breadcrumb-item"><a href="/campaigns/{{ $campaign->id }}">{{ $campaign->name }}</a></li>
                                <li class="breadcrumb-item active">Editar campaña</li>
                            </ol>
                        @else
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('campaigns.index') }}">Campañas</a></li>
                                <li class="breadcrumb-item active">Crear campaña</li>
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
                                @if (isset($campaign))
                                    <form action=" {{ route('campaigns.update', $campaign) }}" method="POST">
                                    @method('PUT')
                                 @else
                                    <form action=" {{ route('campaigns.store') }}" method="POST">
                                @endif
                                    @csrf
                                    <h6 class="d-flex @error('name') text-danger @enderror">Nombre</h6>
                                    <div class="form-group ">
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Ingrese el nombre de la campaña" value="{{ old('name') ?? ($campaign->name ?? '') }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <h6 class="d-flex @error('party') text-danger @enderror">Partido político</h6>
                                    <div class="form-group ">
                                        <input type="text" name="party" id="party"
                                            class="form-control @error('party') is-invalid @enderror"
                                            placeholder="Ingrese el nombre del partido político"
                                            value="{{ old('party') ?? ($campaign->party ?? '') }}">
                                        @error('party')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="d-flex @error('start_date') text-danger @enderror">Fecha de inicio de
                                                la
                                                campaña</h6>
                                            <div class="form-group">
                                                <input type="date" name="start_date" id="start_date"
                                                    class="form-control @error('start_date') is-invalid @enderror"
                                                    placeholder="Ingrese el nombre" value="{{ old('start_date') ?? ($campaign->start_date ?? '') }}">
                                                @error('start_date')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="d-flex @error('end_date') text-danger @enderror">Fecha de fin de la
                                                campaña</h6>
                                            <div class="form-group">
                                                <input type="date" name="end_date" id="end_date"
                                                    class="form-control @error('end_date') is-invalid @enderror"
                                                    placeholder="Ingrese los apellidos" value="{{ old('end_date') ?? ($campaign->end_date ?? '') }}">
                                                @error('end_date')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="d-flex @error('description') text-danger @enderror">Descrpción
                                        (Opcional)
                                    </h6>
                                    <div class="form-group">
                                        <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description"
                                            rows="7" placeholder="Ingrese una breve descripcion de su campaña">{{ old('description') ?? ($campaign->description ?? '') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-outline-primary btn-block">
                                                <strong>
                                                    @if (isset($campaign))
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
