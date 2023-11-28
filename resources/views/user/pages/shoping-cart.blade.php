@extends('user.layouts.main')

@section('content')
  <!-- Hero Section Begin -->
  {{-- <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        {{-- <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                           <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
  <!-- Hero Section End -->

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2 style="color: black">Cart</h2>
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
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $subtotal = 0;
                                    $pesanan_id = []
                                @endphp
                                @foreach ($pesanans as $pesanan)
                                @php
                                    array_push($pesanan_id, $pesanan->id)
                                @endphp
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset($pesanan->produk->path_produk) }}" alt="{{ $pesanan->produk->nama_produk }}" style="width: 160px;">
                                        <h5>{{ ucfirst($pesanan->produk->nama_produk) }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rp. {{ number_format($pesanan->produk->harga, 0, ',', '.') }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{ $pesanan->jumlah }}" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        Rp. {{ number_format($pesanan->produk->harga * $pesanan->jumlah, 0, ',', '.') }}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <form action="{{ route('cart.destroy', $pesanan->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn njir"><i class="fa-solid fa-xmark fa-lg"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $subtotal += $pesanan->produk->harga * $pesanan->jumlah;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('shop.index') }}" class="custom-btn cart-btn-continue-shopping primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="custom-btn cart-btn-update primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
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
                <div class="col-lg-12">
                    <form class="shoping__checkout" action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total Quantity <span>{{ $pesanans->sum('jumlah') }}</span></li>
                            <li>Total <span>Rp. {{ number_format($subtotal, 0, ',', '.') }}</span></li>
                          @foreach ($pesanan_id as $id)
                            <input type="hidden" name="pesanan_id[]" value="{{ $id }}">
                            <input type="hidden" name="total" value="{{ $subtotal }}">
                          @endforeach
                        </ul>
                        <button class="btn primary-btn w-100">PROCEED TO CHECKOUT</button>
                      </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Shoping Cart Section End -->
@endsection
