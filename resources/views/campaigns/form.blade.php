@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="page-heading">
    <div class="row">
        <div class="col-8">
            <div class="d-flex align-items-center">
                <a href=" {{ route('campaigns.index') }} ">
                    <i class="fas fa-2x fa-arrow-left"></i>
                </a>
                <div class="pl-3">
                    <h1>Agregar una nueva campaña</h1>
                </div>
            </div>
        </div>
        <div class="col-4">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('campaigns.index') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('campaigns.index') }}">Campañas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear campaña</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <form action=" {{ route('campaigns.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="d-flex @error('name') text-danger @enderror">Nombre</h6>
                                <div class="form-group ">
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Ingrese el nombre de la campaña"
                                            value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6 class="d-flex @error('party') text-danger @enderror">Partido político</h6>
                                <div class="form-group ">
                                    <input type="text" name="party" id="party" class="form-control @error('party') is-invalid @enderror"
                                            placeholder="Ingrese el nombre del partido político"
                                            value="{{ old('party') }}">
                                    @error('party')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <h6 class="d-flex @error('start_date') text-danger @enderror">Fecha de inicio de la campaña</h6>
                                <div class="form-group">
                                    <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror"
                                            placeholder="Ingrese el nombre"
                                            value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="col-12">
                                    <h6 class="d-flex @error('end_date') text-danger @enderror">Fecha de fin de la campaña</h6>
                                    <div class="form-group">
                                        <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror"
                                                placeholder="Ingrese los apellidos"
                                                value="{{ old('end_date') }}">
                                        @error('end_date')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6 class="d-flex @error('description') text-danger @enderror">Descrpción (Opcional)</h6>
                                <div class="form-group">
                                    <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" rows="7"
                                            placeholder="Ingrese una breve descripcion de su campaña"></textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-outline-primary btn-block">
                                    <strong>
                                        GUARDAR
                                    </strong>
                                </button>
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
