<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-icons/bootstrap-icons.css') }}">
</head>
<body class="campaign-page">
    <div class="campaign-box">
        <!-- /.login-logo -->
        <div class="card elevation-4">
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
                        placeholder="Ingrese el nombre de la campaña"
                        value="{{ old('name') ?? ($campaign->name ?? '') }}">
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
                                placeholder="Ingrese el nombre"
                                value="{{ old('start_date') ?? ($campaign->start_date ?? '') }}">
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
                                placeholder="Ingrese los apellidos"
                                value="{{ old('end_date') ?? ($campaign->end_date ?? '') }}">
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
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.js') }}"></script>
</body>
</html>
