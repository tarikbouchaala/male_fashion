<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="/dashboard/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Account settings - Account | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/dashboard/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/dashboard/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/dashboard/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/dashboard/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/dashboard/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/dashboard/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/dashboard/js/config.js"></script>

    <!-- Toast Alert -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>

<body>

    @yield('content')

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/dashboard/vendor/libs/jquery/jquery.js"></script>
    <script src="/dashboard/vendor/libs/popper/popper.js"></script>
    <script src="/dashboard/vendor/js/bootstrap.js"></script>
    <script src="/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/dashboard/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="/dashboard/js/main.js"></script>

    <!-- Page JS -->
    <script src="/dashboard/js/pages-account-settings-account.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('js/helpers.js') }}"></script>

    @include('partials.crud-alerts')

</body>

</html>
