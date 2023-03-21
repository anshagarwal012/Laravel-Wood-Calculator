<!DOCTYPE html>
<html lang="en" class="js">

<head>
    {{-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    <link id="skin-default" rel="stylesheet" href="./css/theme.css">
    <link rel="stylesheet" href="./css/ansh.min.css">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">

</head>

<body class="nk-body bg-lighter ">
    <div class="loading">Loading&#8230;</div>
    <div class="nk-app-root">
        <!-- wrap -->
        <div class="nk-wrap ">
            <!-- main header -->
            <div class="nk-header is-light">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-header-brand">
                            <a href="/" class="logo-link">
                                <img class="logo-dark logo-img" src="./img/logo.png" alt="logo">
                            </a>
                        </div>
                        <div class="nk-header-tools ml-auto" data-content="headerNav">
                            <ul class="nk-menu nk-menu-main ui-s2">
                                <li class="nk-menu-item">
                                    <a href="/add" class="nk-menu-link">
                                        <span class="nk-menu-text">Add Invoice</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/get" class="nk-menu-link">
                                        <span class="nk-menu-text">Invoice List</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-header-wrap -->
                </div><!-- .container-fliud -->
            </div>
            <!-- main header -->
            <!-- content -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <!-- content -->
            <!-- footer -->
            <div class="nk-footer bg-white">
                <div class="container-fluid">
                    <div class="nk-footer-wrap"></div>
                </div>
            </div>
            <!-- footer -->
        </div>
        <!-- wrap -->
    </div>
    <!-- app-root -->
    <!-- JavaScript -->
    <script src="./js/bundle.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="./js/toastr.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>
