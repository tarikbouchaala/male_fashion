@extends('layouts.app')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="/img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Winter Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                    commitment to exceptional quality.</p>
                                <a href="/shop" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a><i class="fa fa-facebook"></i></a>
                                    <a><i class="fa fa-twitter"></i></a>
                                    <a><i class="fa fa-pinterest"></i></a>
                                    <a><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="/img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Winter Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                    commitment to exceptional quality.</p>
                                <a href="/shop" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a><i class="fa fa-facebook"></i></a>
                                    <a><i class="fa fa-twitter"></i></a>
                                    <a><i class="fa fa-pinterest"></i></a>
                                    <a><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    @unless (count($categories) == 0)
        <section class="banner spad">
            <div class="container">
                <div class="row">
                    @if (count($categories) > 3)
                        @for ($i = 0; $i < 3; $i++)
                            <x-category-card :number="$i" :category="$categories[$i]" />
                        @endfor
                    @else
                        @for ($i = 0; $i < count($categories); $i++)
                            <x-category-card :number="$i" :category="$categories[$i]" />
                        @endfor
                    @endif
                </div>
            </div>
        </section>
    @endunless
    <!-- Banner Section End -->
@endsection
