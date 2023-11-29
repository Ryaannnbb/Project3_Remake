@extends('user.layouts.main')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color: black">Detail Order</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detailpesanans as $detailpesanan)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset($detailpesanan->produk->path_produk) }}" alt="{{ $detailpesanan->produk->nama_produk }}" style="width: 160px;">
                                        <h5>{{ ucfirst($detailpesanan->produk->nama_produk) }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rp. {{ number_format($detailpesanan->produk->harga, 0, ',', '.') }}
                                    </td>
                                    <td class="shoping__cart__total">
                                        <span>{{ $detailpesanan->jumlah }}</span>
                                    </td>
                                    <td class="shoping__cart__total">
                                        Rp. {{ number_format($detailpesanan->produk->harga * $detailpesanan->jumlah, 0, ',', '.') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('order') }}" class="custom-btn cart-btn-continue-shopping primary-btn cart-btn">Back</a>
                        {{-- <a href="#" class="custom-btn cart-btn-update primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart
                        </a> --}}
                    </div>
                </div>
                {{-- <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-12">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total Quantity <span>{{ $detailpesanans->sum('jumlah') }}</span></li>
                            <li>Total <span>Rp. {{ number_format($subtotal, 0, ',', '.') }}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
    @endsection
