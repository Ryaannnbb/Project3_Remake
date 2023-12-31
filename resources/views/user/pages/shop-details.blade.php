@extends('user.layouts.main')

@section('content')
    <!-- Breadcrumb Section Begin -->
    {{-- <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable Package</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('home') }}">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Breadcrumb Section End -->
    <!-- Add Back Button -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <a href="{{ route('shop.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="{{ asset($produk->path_produk) }}"
                                alt="">
                        </div>
                        {{-- <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="img/product/details/thumb-1.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                src="img/product/details/thumb-2.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                src="img/product/details/thumb-3.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                src="img/product/details/thumb-4.jpg" alt="">
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $produk->nama_produk }}</h3>
                        {{-- <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div> --}}
                        <div class="product__details__pr">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</div>
                        <p>{{ $produk->deskripsi }}</p>
                        <p>Stock <span class="@if ($produk->stok <= 0)
                            text-danger
                        @endif">{{ $produk->stok }}</span></p>
                        <form action="{{ route('shop.order', $produk->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="product__details__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="jumlah" value="1" min="1">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn primary-btn" @if ($produk->stok <= 0)
                                        @disabled(true)
                                    @endif>ADD TO CARD</button>
                                </div>
                                <div class="col-12">
                                    @error('jumlah')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                        {{-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> --}}
                        <ul>
                            <li><b>Availability</b> @if ($produk->stok > 0 )
                                <span>In Stock</span>
                                @else
                                <span class="text-danger">Sold Out</span>
                            @endif</li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
