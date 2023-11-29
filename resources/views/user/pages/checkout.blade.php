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
            <div class="hero__search__phone">
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
  <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2 style="color: black">Checkout</h2>
            {{-- <div class="breadcrumb__option">
              <a href="{{ route('home') }}">Home</a>
              <span>Checkout</span>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Checkout Section Begin -->
  <section class="checkout spad">
    <div class="container">
      {{-- <div class="row">
        <div class="col-lg-12">
          <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
          </h6>
        </div>
      </div> --}}
      <div class="checkout__form">
        <h4>Billing Details</h4>
          <div class="row">
            <div class="col-lg-8 col-md-6">
              <div class="row">
                <div class="col-lg-12">
                  <div class="checkout__input">
                    <p>Name<span>*</span></p>
                    <p class="checkout__order__products">{{ auth()->user()->name }}</p>
                  </div>
                </div>
              </div>
              <div class="checkout__input">
                <p>Address<span>*</span></p>
                <p type="text" class="checkout__input__add" value="">{{ auth()->user()->address }}</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="checkout__order">
                <h4>Your Order</h4>
                <div class="checkout__order__products">Products <span>Total</span></div>
                <ul>
                  @php
                    $total = 0;
                  @endphp
                  @foreach ($pesanan as $ps)
                    <li>{{ $ps->produk->nama_produk }}<span>Rp. {{ number_format($ps->total, 0, ',', '.') }}</span></li>
                    @php
                      $total += $ps->total;
                    @endphp
                  @endforeach
                </ul>
                <div class="checkout__order__total">Total <span>Rp. {{ number_format($total, 0, ',', '.') }}</span></div>
                <form action="{{ route('bayar', $pesanan_id) }}" method="POST">
                  @csrf
                  <div class="checkout__input__checkbox">
                    @foreach ($payments as $payment)
                      <div class="d-flex">
                        <input type="radio" name="payment" id="{{ $payment->metode_pembayaran }}"
                          value="{{ $payment->metode_pembayaran }}">
                        <label for="{{ $payment->metode_pembayaran }}"
                          class="my-0 mx-1">{{ $payment->metode_pembayaran }}</label>
                      </div>
                    @endforeach
                  </div>
                  <button type="submit" class="site-btn">PLACE ORDER</button>
                </form>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- Checkout Section End -->
@endsection
