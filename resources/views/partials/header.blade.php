<div id="preloder">
    <div class="loader"></div>
</div>

<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__nav__option">
        <a href="/cart"><img src="{{ asset('img/icon/cart.png') }}" alt=""></a>
        @auth
            <a
                href="{{ Auth::user()->is_admin == '0' ? route('dashboard-client-account') : route('dashboard-admin-account') }}">
                <img src="{{ asset('img/icon/dashboard.png') }}" alt="">
            </a>
            <a href="/logout"><img src="{{ asset('img/icon/logout.svg') }}" alt=""></a>
        @endauth

        @guest
            <a href="/login"><img src="{{ asset('img/icon/user.png') }}" alt=""></a>
        @endguest
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Free shipping, 30-day return or refund guarantee.</p>
    </div>
</div>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="/"><img src="/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="{{ Request::path() === '/' ? 'active' : '' }}"><a href="/">Home</a></li>
                        <li class="{{ Request::path() === 'shop' ? 'active' : '' }}"><a href="/shop">Shop</a></li>
                        <li class="{{ Request::path() === 'about' ? 'active' : '' }}"><a href="/about">About Us</a>
                        <li class="{{ Request::path() === 'contact' ? 'active' : '' }}"><a href="/contact">Contact
                                Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="/cart"><img src="{{ asset('img/icon/cart.png') }}" alt=""></a>
                    @auth
                        <a
                            href="{{ Auth::user()->is_admin == '0' ? route('dashboard-client-account') : route('dashboard-admin-account') }}">
                            <img src="{{ asset('img/icon/dashboard.png') }}" alt="">
                        </a>
                        <a href="/logout"><img src="{{ asset('img/icon/logout.svg') }}" alt=""></a>
                    @endauth

                    @guest
                        <a href="/login"><img src="{{ asset('img/icon/user.png') }}" alt=""></a>
                    @endguest

                </div>
            </div>
        </div>

        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
