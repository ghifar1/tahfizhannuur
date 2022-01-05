<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/fc-4.0.1/fh-3.2.1/r-2.2.9/sc-2.0.5/sp-1.4.0/datatables.min.css"/>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img style="width: 50px" src="data:image/jpeg;base64,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"/>
            </div>
            <div class="sidebar-brand-text mx-3">Tahfiz Annuur</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        @include('layouts.sbnavigation')

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('layouts.sbtopnavigation')

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">{{$title}}</h1>

                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-primary">Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/fc-4.0.1/fh-3.2.1/r-2.2.9/sc-2.0.5/sp-1.4.0/datatables.min.js"></script>
@stack('script')

</body>

</html>
