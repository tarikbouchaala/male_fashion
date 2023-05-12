@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    @if (count($products) == 0)
        <section class="shopping-cart spad">
            <h1 style="text-align: center;margin-block: revert;">The Cart Is Empty</h1>
        </section>
    @else
        <!-- Shopping Cart Section Begin -->
        <section class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="{{ asset('storage/images/' . $product['product']->image) }}"
                                                        alt="">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6>{{ $product['product']->name }}</h6>
                                                    <h5>{{ $product['product']->price }} $</h5>
                                                </div>
                                            </td>
                                            <td class="quantity__item">
                                                <div class="quantity">
                                                    <form action="{{ route('edit-cart', $product['product']->id) }}"
                                                        id="update-product-{{ $product['product']->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="pro-qty-2">
                                                            <input readonly name="product_quantity" type="text"
                                                                value={{ $product['quantity'] }}>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="cart__price">{{ $product['product']->price * $product['quantity'] }}
                                                $
                                            </td>
                                            <td class="cart__close"
                                                style="display: flex;justify-content: center;align-items: center;gap: 3px;flex-wrap: wrap;">
                                                <div
                                                    style="width: 40px;background: #f3f2ee;border-radius: 50%;height: 40px;display: flex;justify-content: center;align-items: center;flex-wrap: wrap;">
                                                    <a class="cursor-pointer"
                                                        style="align-items: center;justify-content: center;display: flex;"
                                                        onclick="document.getElementById('update-product-{{ $product['product']->id }}').submit(); return false;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                            style="width: 20px;height: 20px;">
                                                            <path
                                                                d="M142.9 142.9c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5c0 0 0 0 0 0H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5c7.7-21.8 20.2-42.3 37.8-59.8zM16 312v7.6 .7V440c0 9.7 5.8 18.5 14.8 22.2s19.3 1.7 26.2-5.2l41.6-41.6c87.6 86.5 228.7 86.2 315.8-1c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.2 62.2-162.7 62.5-225.3 1L185 329c6.9-6.9 8.9-17.2 5.2-26.2s-12.5-14.8-22.2-14.8H48.4h-.7H40c-13.3 0-24 10.7-24 24z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                                <form action="{{ route('delete-product-cart', $product['product']->id) }}"
                                                    id="delete-product-{{ $product['product']->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="cursor-pointer"
                                                        onclick="document.getElementById('delete-product-{{ $product['product']->id }}').submit(); return false;"><i
                                                            class="fa fa-close"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn">
                                    <a href="/shop">Continue Shopping</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn update__btn">
                                    <form id="empty-cart" action="{{ route('empty-cart') }}" method="POST">
                                        @csrf
                                        <a class="cursor-pointer"
                                            onclick="document.getElementById('empty-cart').submit(); return false;">Empty
                                            Cart</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart__total">
                            <ul>
                                <li style="font-size:20px">Total <span>{{ $total }} $</span></li>
                            </ul>
                            <a href="/checkout" class="primary-btn">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shopping Cart Section End -->
    @endif
@endsection
