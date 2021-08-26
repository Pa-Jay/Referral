<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ env('APP_NAME') }} </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/d_assets/images/logo.png">
    <link href="/d_assets/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="/d_assets/vendor/chartist/css/chartist.min.css">
    <link href="/d_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/d_assets/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="/d_assets/css/style.css" rel="stylesheet">
    <link href="/d_assets/css/custom.css" rel="stylesheet">


    <style>
        .swal-text {
            color: black;
        }

        .swal-button-container {
            border: 0;
        }

        .swal-button:not([disabled]) {
            background-color: #222fb9;
        }

        .swal-button:not([disabled]):hover {
            background-color: #060d5c;
        }

    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="/d_assets/images/logo.png" alt="">
                {{-- <img class="logo-compact" src="/d_assets/images/logo-text.png" alt=""> --}}
                {{-- <img class="brand-title" src="/d_assets/images/logo-text.png" alt=""> --}}
                <strong class="brand-title text-white">LTC Master Airdrop</strong>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->




        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Hi! {{ Auth::user()->username }}
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="{{ route('user.home') }}" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a href="{{ route('user.referrals') }}" aria-expanded="false">
                            <i class="flaticon-381-link"></i>
                            <span class="nav-text">Referrals</span>
                        </a>
                    </li>
                    <li><a href="{{ route('user.profile') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-settings-2"></i>
                            <span class="nav-text">Profile</span>
                        </a>
                    </li>
                    <li><a href="javascript:logout()" aria-expanded="false">
                            <i class="flaticon-381-exit"></i>
                            <span class="nav-text">Logout</span>
                        </a>
                    </li>
                    <form action="{{ route('logout') }}" id="logout" method="post">@csrf</form>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->


        <!--**********************************
            Content body start
        ***********************************-->
        <div id="app">
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">

            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="/d_assets/vendor/global/global.min.js"></script>
    <script src="/d_assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/d_assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/d_assets/vendor/bootstrap-datetimepicker/js/moment.js"></script>
    <script src="/d_assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/d_assets/js/custom.min.js"></script>
    <script src="/d_assets/js/deznav-init.js"></script>
    <!-- Apex Chart -->
    <script src="/d_assets/vendor/apexchart/apexchart.js"></script>



    <!-- Chart piety plugin files -->
    <script src="/d_assets/vendor/peity/jquery.peity.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Dashboard 1 -->
    <script src="/d_assets/js/dashboard/events.js"></script>
    <script>
        function copy(text) {
            window.navigator.clipboard.writeText(text)
            swal('Yess!', 'Copied: ' + text, 'success')
        }

        function logout() {
            $('#logout').submit()
        }

    </script>

    @if (session('error'))
    <script>
        swal('Oops!', '{{ session("error") }}', 'error')
    </script>
    @endif

    @if (session('success'))
    <script>
        swal('Great!!', '{{ session("success") }}', 'success')
    </script>
    @endif


</body>

</html>
