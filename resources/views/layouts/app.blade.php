<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Male-Fashion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <!-- Toast Alert -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>

<body>
    <!-- Header Section Begin -->
    @include('partials.header')
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    @include('partials.footer')
    <!-- Footer Section End -->

    @if (session()->has('login-success'))
        <script>
            Toastify({
                text: "{{ session('login-success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                style: {
                    background: "#198754"
                },
                stopOnFocus: true,
            }).showToast();
        </script>
    @endif
    @if (session()->has('logout-success'))
        <script>
            Toastify({
                text: "{{ session('logout-success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                style: {
                    background: "#198754"
                },
                position: "right",
                stopOnFocus: true,
            }).showToast();
        </script>
    @endif
    @if (session()->has('product-update-cart'))
        <script>
            Toastify({
                text: "Product Updated",
                duration: 3000,
                close: true,
                gravity: "top",
                style: {
                    background: "#198754"
                },
                position: "right",
                stopOnFocus: true,
            }).showToast();
        </script>
    @endif
    @if (session()->has('cart-emptied'))
        <script>
            Toastify({
                text: "The cart is deleted successfully",
                duration: 3000,
                close: true,
                gravity: "top",
                style: {
                    background: "#198754"
                },
                position: "right",
                stopOnFocus: true,
            }).showToast();
        </script>
    @endif
    @if (session()->has('blocked-user'))
        <script>
            Toastify({
                text: "You can't login you're blocked right know",
                duration: 3500,
                close: true,
                gravity: "top",
                position: "right",
                style: {
                    background: "#dc3545"
                },
                stopOnFocus: true,
            }).showToast();
        </script>
    @endif
    @if (session()->has('product-delete-cart'))
        <script>
            Toastify({
                text: "Product removed from cart",
                duration: 3500,
                close: true,
                gravity: "top",
                position: "right",
                style: {
                    background: "#dc3545"
                },
                stopOnFocus: true,
            }).showToast();
        </script>
    @endif

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/myHelpers.js') }}"></script>

</body>

</html>
