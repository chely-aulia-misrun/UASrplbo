<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sistem Informasi E-Raport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/logo.png">

    @stack('css')
    <!-- plugins -->
    <link href="/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css" />

    <script>
        window.myToken =  <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        @media print {
            #printPageButton {
                display: none;
            }
        }
    </style>
</head>

<body>
<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
        <div class="container-fluid">
            <!-- LOGO -->
            <a href="/" class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                            <span class="d-inline h5 ml-1 text-logo">MAN 3 PEKANBARU</span>
                        </span>
                <span class="logo-sm">

                        </span>
            </a>

            <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
                <li class="">
                    <button class="button-menu-mobile open-left disable-btn">
                        <i data-feather="menu" class="menu-icon"></i>
                        <i data-feather="x" class="close-icon"></i>
                    </button>
                </li>
            </ul>

            <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">

            </ul>
        </div>

    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">
        <div class="media user-profile mt-2 mb-2">
            <img src="/logo.png" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
            <img src="/logo.png" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

            <div class="media-body">
                <h6 class="pro-user-name mt-0 mb-0">{{\Illuminate\Support\Facades\Auth::user()->nama}}</h6>
                <span class="pro-user-desc">{{\Illuminate\Support\Facades\Auth::user()->role}}</span>
            </div>
            <div class="dropdown align-self-center profile-dropdown-menu">
                <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                   aria-expanded="false">
                    <span data-feather="chevron-down"></span>
                </a>
                <div class="dropdown-menu profile-dropdown">
                    <a href="javascript:void(0);" onclick="$('#formLogout').submit()" class="dropdown-item notify-item">
                        <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                        <span>Keluar</span>
                    </a>
                </div>
                <form id="formLogout" action="/logout" method="post">
                    @csrf
                </form>
            </div>
        </div>
        <div class="sidebar-content">
            <!--- Sidemenu -->
            @include('layouts.sidemenu')
            <!-- End Sidebar -->

            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->

    </div>

    <div class="content-page">
        <div class="content">
            @yield('content')
        </div> <!-- content -->

    </div>


</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="/assets/js/vendor.min.js"></script>

<!-- optional plugins -->
<script src="/assets/libs/moment/moment.min.js"></script>
<script src="/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="/assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


@stack('js')
<!-- page js -->
{{--<script src="/assets/js/pages/dashboard.init.js"></script>--}}

<!-- App js -->
<script src="/assets/js/app.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</body>
</html>
