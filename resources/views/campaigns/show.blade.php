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
                        <h1>Información de la campaña</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('campaigns.index') }}">Campañas</a></li>
                            <li class="breadcrumb-item active">{{$campaign->name}}</li>
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
                                            <form action="{{ route('campaigns.destroy', [$campaign]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger align-bottom pl-5 pr-5">Borrar</button>
                                            </form>
                                            </a>
                                        </h1>
                                    </div>
                                    <div class="col-6 text-right">
                                        <h1><a href="{{route('campaigns.edit', [$campaign->id])}}" type="reset" class="btn btn-outline-primary align-bottom pl-5 pr-5">Editar</a></h1>
                                    </div>
                                </div>
                                <form action=" {{ route('campaigns.store') }}" method="POST">
                                    @csrf
                                    <h6 class="d-flex">Nombre</h6>
                                    <div class="form-group ">
                                        <input type="text" name="name" id="name"
                                            class="form-control"
                                            placeholder="Ingrese el nombre de la campaña" value="{{$campaign->name}}" disabled="">
                                    </div>
                                    <h6 class="d-flex">Partido político</h6>
                                    <div class="form-group ">
                                        <input type="text" name="party" id="party"
                                            class="form-control"
                                            placeholder="Ingrese el nombre del partido político"
                                            value="{{$campaign->party}}" disabled="">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Fecha de inicio de
                                                la
                                                campaña</h6>
                                            <div class="form-group">
                                                <input type="date" name="start_date" id="start_date"
                                                    class="form-control"
                                                    placeholder="Ingrese el nombre" value="{{$campaign->start_date}}" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Fecha de fin de la
                                                campaña</h6>
                                            <div class="form-group">
                                                <input type="date" name="end_date" id="end_date"
                                                    class="form-control"
                                                    placeholder="Ingrese los apellidos" value="{{$campaign->end_date}}" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="d-flex">Descrpción
                                        (Opcional)
                                    </h6>
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" id="description"
                                            rows="7" placeholder="Ingrese una breve descripcion de su campaña" disabled="">{{$campaign->description}}</textarea>
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
