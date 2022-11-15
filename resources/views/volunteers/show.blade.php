@extends('layouts.main', ['sidebar' => 'Volunteers'])

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
                        <h1>Información del voluntario</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('volunteers.index') }}">Voluntarios</a></li>
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
                                <form action=" {{ route('volunteers.store') }}" method="POST">
                                    <h4 class="d-flex text-primary">Datos personales</h4>
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
                                        <input type="date" name="birthdate" id="birthdate"
                                            class="form-control"
                                            placeholder="Ingrese la fecha de nacimiento"
                                            value="{{$volunteer->auxVolunteer->birthdate}}" disabled="">
                                    </div>
                                    <br>
                                    <h4 class="d-flex text-primary">Domicilio</h4>
                                    <h6 class="d-flex">Calle(s)</h6>
                                    <div class="form-group ">
                                        <input type="text" name="street" id="street"
                                            class="form-control"
                                            placeholder="Ingrese la calle" value="{{$volunteer->address->external_number}}" disabled="">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Número exterior</h6>
                                            <div class="form-group">
                                                <input type="text" name="external_number" id="external_number"
                                                    class="form-control"
                                                    placeholder="Ingrese el número exterior" value="{{$volunteer->address->external_number}}" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Número interior</h6>
                                            <div class="form-group">
                                                <input type="text" name="internal_number" id="internal_number"
                                                    class="form-control"
                                                    placeholder="Ingrese el numero interior" value="{{$volunteer->address->internal_number}}" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Colonia</h6>
                                            <div class="form-group">
                                                <input type="text" name="suburb" id="suburb"
                                                    class="form-control"
                                                    placeholder="Ingrese la colonia" value="{{$volunteer->address->suburb}}" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Código postal</h6>
                                            <div class="form-group">
                                                <input type="text" name="zipcode" id="zipcode"
                                                    class="form-control"
                                                    placeholder="Ingrese el código postal" value="{{$volunteer->address->zipcode}}" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="d-flex">Calle(s)</h6>
                                    <div class="form-group ">
                                        <input type="text" name="elector_key" id="elector_key"
                                            class="form-control"
                                            placeholder="Ingrese la calle" value="{{$volunteer->auxVolunteer->elector_key}}" disabled="">
                                    </div>
                                    <br>
                                    <h4 class="d-flex text-primary">Contacto</h4>
                                    <h6 class="d-flex">Correo electrónico</h6>
                                    <div class="form-group ">
                                        <input type="text" name="email" id="email"
                                            class="form-control"
                                            placeholder="Ingrese su email" value="{{$volunteer->email}}" disabled="">
                                    </div>
                                    <h6 class="d-flex">Teléfono</h6>
                                    <div class="form-group ">
                                        <input type="text" name="phone" id="phone"
                                            class="form-control"
                                            placeholder="Ingrese su teléfono" value="{{$volunteer->phone}}" disabled="">
                                    </div>
                                    <br>
                                    <h4 class="d-flex text-primary">Identificación de la sección</h4>
                                    <h6 class="d-flex">Section</h6>
                                    <div class="form-group ">
                                        <input type="text" name="section" id="section"
                                            class="form-control"
                                            placeholder="Ingrese su Sección" value="{{$volunteer->section->section}}" disabled="">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Municipio</h6>
                                            <div class="form-group">
                                                <input type="text" name="municipality" id="municipality"
                                                    class="form-control"
                                                    placeholder="Ingrese su municipio" value="{{$volunteer->section->municipality->name}}" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Número de municipio</h6>
                                            <div class="form-group">
                                                <input type="text" name="municipality_number" id="municipality_number"
                                                    class="form-control"
                                                    placeholder="Ingrese el código postal" value="{{$volunteer->section->municipality->number}}" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="d-flex">Sector</h6>
                                    <div class="form-group ">
                                        <input type="text" name="sector" id="sector"
                                            class="form-control"
                                            placeholder="Ingrese su teléfono" value="{{$volunteer->auxVolunteer->sector}}" disabled="">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Distrito local</h6>
                                            <div class="form-group">
                                                <input type="text" name="localDistrict" id="localDistrict"
                                                    class="form-control"
                                                    placeholder="Ingrese su municipio" value="{{$volunteer->section->localDistrict->name}}" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Número de distrito local</h6>
                                            <div class="form-group">
                                                <input type="text" name="localDistrict_number" id="localDistrict_number"
                                                    class="form-control"
                                                    placeholder="Ingrese el código postal" value="{{$volunteer->section->localDistrict->number}}" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Distrito federal</h6>
                                            <div class="form-group">
                                                <input type="text" name="federalDistrict" id="federalDistrict"
                                                    class="form-control"
                                                    placeholder="Ingrese su municipio" value="{{$volunteer->section->federalDistrict->name}}" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Número de distrito federal</h6>
                                            <div class="form-group">
                                                <input type="text" name="federalDistrict_number" id="federalDistrict_number"
                                                    class="form-control"
                                                    placeholder="Ingrese el código postal" value="{{$volunteer->section->federalDistrict->number}}" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Estado</h6>
                                            <div class="form-group">
                                                <input type="text" name="state" id="state"
                                                    class="form-control"
                                                    placeholder="Ingrese su municipio" value="{{$volunteer->section->state->name}}" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="d-flex">Número de estado</h6>
                                            <div class="form-group">
                                                <input type="text" name="state_number" id="state_number"
                                                    class="form-control"
                                                    placeholder="Ingrese el código postal" value="{{$volunteer->section->state->id}}" disabled="">
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <h4 class="d-flex text-primary">Otros datos</h4>
                                    <h6 class="d-flex">¿Va a cuidar la casilla de la sección donde vive?</h6>
                                    <div class="form-group ">
                                        <input type="text" name="local_voting_booth" id="local_voting_booth"
                                            class="form-control"
                                            value="@if ($volunteer->auxVolunteer->local_voting_booth) Sí @else No @endif" disabled="">
                                    </div>
                                    <h6 class="d-flex">Tipo de representante</h6>
                                    <div class="form-group">
                                        <input type="text" name="type" id="type"
                                            class="form-control"
                                            value="@switch($volunteer->auxVolunteer->type) @case(0) RG @break @case(1) RC @break @case(2) Otro @break @endswitch" disabled="">
                                    </div>
                                    <h6 class="d-flex">Notas</h6>
                                    <div class="form-group">
                                        <textarea class="form-control" name="notes" id="notes"
                                            rows="7" placeholder="" disabled="">{{$volunteer->auxVolunteer->notes}}</textarea>
                                    </div>

                                    <br>
                                    <h4 class="d-flex text-primary">Fotografías</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <div class="card">
                                                <img class="card-img-top" src="https://centralelectoral.ine.mx/wp-content/uploads/2020/02/qr-1.jpg" alt="Card image cap">

                                              </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <div class="card">
                                                <img class="card-img-top" src="https://centralelectoral.ine.mx/wp-content/uploads/2020/02/qr-1.jpg" alt="Card image cap">

                                              </div>
                                        </div>
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
