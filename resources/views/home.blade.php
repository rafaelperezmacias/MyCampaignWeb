<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>
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
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-icons/bootstrap-icons.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark elevation-3">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">
                    <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">My Campaign</span>
                </a>
                <ul class="nav nav-pills p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1"data-toggle="tab">Tab 1</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab 2</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab 3</a></li>
                </ul>
                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2"
                                alt="User Image">
                            <span class="d-none d-md-inline">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                                    alt="User Image">
                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <a href="#" class="btn btn-default btn-flat float-right btn-block">Cerrar
                                    sesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container">
                <section class="content-header">
                    <div class="row">
                        <div class="col-12">
                            <!-- Custom Tabs -->
                            <div class="card mt-3">
                                <div class="card-header d-flex p-0">

                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1">
                                            A wonderful serenity has taken possession of my entire soul,
                                            like these sweet mornings of spring which I enjoy with my whole heart.
                                            I am alone, and feel the charm of existence in this spot,
                                            which was created for the bliss of souls like mine. I am so happy,
                                            my dear friend, so absorbed in the exquisite sense of mere tranquil
                                            existence,
                                            that I neglect my talents. I should be incapable of drawing a single stroke
                                            at the present moment; and yet I feel that I never was a greater artist than
                                            now.
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_2">
                                            The European languages are members of the same family. Their separate
                                            existence is a myth.
                                            For science, music, sport, etc, Europe uses the same vocabulary. The
                                            languages only differ
                                            in their grammar, their pronunciation and their most common words. Everyone
                                            realizes why a
                                            new common language would be desirable: one could refuse to pay expensive
                                            translators. To
                                            achieve this, it would be necessary to have uniform grammar, pronunciation
                                            and more common
                                            words. If several languages coalesce, the grammar of the resulting language
                                            is more simple
                                            and regular than that of the individual languages.
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_3">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book.
                                            It has survived not only five centuries, but also the leap into electronic
                                            typesetting,
                                            remaining essentially unchanged. It was popularised in the 1960s with the
                                            release of Letraset
                                            sheets containing Lorem Ipsum passages, and more recently with desktop
                                            publishing software
                                            like Aldus PageMaker including versions of Lorem Ipsum.
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- ./card -->
                        </div>
                        <!-- /.col -->
                    </div>
                </section>
                <div class="container-fluid">
                    <h1 class="mb-3">Frecuentes</h1>
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach ($firtsCampaigns as $campaign)
                            <div class="col">
                                <div class="card card-success h-90 elevation-2" id="card{{ $loop->index }}">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <p class="card-title font-weight-bold">{{ $campaign->name }}</p>
                                        <p class="card-text">{{ $campaign->party }}</p>
                                        <p class="card-text"> {{ $campaign->start_date }} - {{ $campaign->end_date }}
                                        </p>
                                    </div>
                                </div>
                                <form action="{{ route('home.campaign') }}" method="POST"
                                    id="form{{ $loop->index }}">
                                    @csrf
                                    <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Listado de campañas</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <h1><a href="{{ route('campaigns.create') }}" type="reset"
                                    class="btn btn-outline-primary align-bottom pl-5 pr-5">Agregar campaña</a></h1>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="card mr-2 ml-2">
                        <div class="card-body">
                            <table class="table table table-bordered table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Partido Político</th>
                                        <th>Periodo</th>
                                        <th>Accions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allCampaigns as $campaign)
                                        <tr>
                                            <td> {{ $campaign->name }} </td>
                                            <td> {{ $campaign->party }} </td>
                                            <td> {{ $campaign->start_date }} - {{ $campaign->end_date }} </td>
                                            <td>
                                                <a href="{{ route('campaigns.show', $campaign) }}"
                                                    class="btn-sm btn-outline-success icon icon-left pt-2">
                                                    <i class="fas fa-search"></i> Detalles
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
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

<!-- SweetAlert2 -->
<link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>

@if ( session()->has('mensaje') )
    <script>
        window.onload = function() {
        Swal.fire({
            icon: "{{session('alert-type')}}",
            title: "{{session('mensaje')}}",
        });
    }
    </script>
@endif

    <script>
        $(function() {
            $("#table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        for (let i = 0; i < 8; i++) {
            let card = document.getElementById('card' + i);

            card.addEventListener('mouseenter', (e) => {
                card.className = "card card-success elevation-5 h-90";
                card.style = "cursor: pointer;"
            });

            card.addEventListener('mouseleave', (e) => {
                card.className = "card card-success elevation-2 h-90";
            });

            card.addEventListener('click', (e) => {
                document.getElementById('form' + i).submit();
            });

        }
    </script>
</body>

</html>
