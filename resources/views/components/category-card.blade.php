@props(['category', 'number'])

@switch($number)
    @case(1)
        <div class="col-lg-7 offset-lg-4">
            <div class="banner__item">
                <div class="banner__item__pic">
                    <img src="{{ asset('storage/images/' . $category['image']) }}" alt="">
                </div>
                <div class="banner__item__text">
                    <h2>{{ $category['name'] }}</h2>
                    <a href="/shop">Shop now</a>
                </div>
            </div>
        </div>
    @break

    @case(2)
        <div class="col-lg-5">
            <div class="banner__item banner__item--middle">
                <div class="banner__item__pic">
                    <img src="{{ asset('storage/images/' . $category['image']) }}" alt="">
                </div>
                <div class="banner__item__text">
                    <h2>{{ $category['name'] }}</h2>
                    <a href="/shop">Shop now</a>
                </div>
            </div>
        </div>
    @break

    @case(3)
        <div class="col-lg-7">
            <div class="banner__item banner__item--last">
                <div class="banner__item__pic">
                    <img src="{{ asset('storage/images/' . $category['image']) }}" alt="">
                </div>
                <div class="banner__item__text">
                    <h2>{{ $category['name'] }}</h2>
                    <a href="/shop">Shop now</a>
                </div>
            </div>
        </div>
    @break

    @default
        <div class="col-lg-5">
            <div class="banner__item banner__item--middle">
                <div class="banner__item__pic">
                    <img src="{{ asset('storage/images/' . $category['image']) }}" alt="">
                </div>
                <div class="banner__item__text">
                    <h2>{{ $category['name'] }}</h2>
                    <a href="/shop">Shop now</a>
                </div>
            </div>
        </div>
@endswitch
