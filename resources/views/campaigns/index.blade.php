@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="{{ route('campaigns.create') }}" type="reset" class="btn btn-outline-primary align-bottom">Agregar campaña</a>
            </div>
        </div>
    </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Partido Político</th>
                            <th>Periodo</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campaigns as $campaign)
                        <tr>
                            <td> {{ $campaign->name }} </td>
                            <td> {{ $campaign->party }} </td>
                            <td> {{ $campaign->start_date }} - {{ $campaign->end_date }} </td>
                            <td>
                                <a href="{{ route('campaigns.show', $campaign) }}" class="btn-sm btn-outline-success icon icon-left pt-2">
                                    <i class="bi bi-search"></i> Detalles
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
