@extends('user.layouts.main')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
            <h2 style="color: black">Order</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Shoping Cart Section Begin -->
  <section class="shoping-cart spad">
    <div class="container">
      @if ($pesanans->count() > 0)
        <div class="row">
          <div class="col-lg-12">
            <div class="shoping__cart__table">
              <table>
                <thead>
                  <tr>
                    <th>Total Products</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pesanans as $pesanan)
                    {{-- {{ dd($pesanan->detailPesanan->id) }} --}}
                    <tr>
                      <td>
                        <b>{{ $pesanan->detailPesanan->count() }}</b>
                      </td>
                      <td>
                        <b>Rp. {{ number_format($pesanan->total, 0, ',', '.') }}</b>
                      </td>
                      <td>
                        <span class="badge bg-secondary">{{ ucfirst($pesanan->status) }}</span>
                      </td>
                      <td class="shoping__cart__item__close" style="text-align: center">
                        <div class="njir m-0 d-flex justify-content-center" style="align-items: center;">
                          <a href="{{ route('order.detail', $pesanan->id) }}">
                            <button type="button" class="btn">
                              <i class="fa-solid fa-eye fa-lg"></i>
                            </button>
                          </a>
                          @if ($pesanan->status == 'pending')
                            <form action="{{ route('order.destroy', $pesanan->id) }}" method="POST">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn soasik njir"><i
                                  class="fa-solid fa-xmark fa-lg"></i></button>
                            </form>
                          @elseif ($pesanan->status == 'waiting payment')
                            <a href="{{ route('checkout.index', $pesanan->id) }}">
                              <button type="button" class="btn">
                                <i class="fa-solid fa-money-bill-1-wave fa-lg"></i>
                              </button>
                            </a>
                          @elseif ($pesanan->status == 'rejected')
                            <button type="button" class="btn" data-original-title="Delete user" data-bs-toggle="modal"
                              data-bs-target="#exampleModal{{ $pesanan->id }}">
                              <i class="fa-regular fa-eye fa-lg"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $pesanan->id }}" tabindex="-1"
                              aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <form class="modal-content" action="{{ route('order.destroy', $pesanan->id) }}"
                                  method="POST">
                                  @method('delete')
                                  @csrf
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                      Pesan Tolak</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <h4 class="text-center mt-2">{{ $pesanan->pesan_tolak }}
                                      </h3>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          @elseif ($pesanan->status == 'delivered')
                            <form action="{{ route('order.destroy', $pesanan->id) }}" method="POST"
                              style="display: inline">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn hadeh njir mt-3" data-original-title="Delete user"
                                data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pesanan->id }}">
                                <i class="fa-solid fa-check"></i>
                              </button>
                            </form>
                          @elseif ($pesanan->status == 'shipped')
                            <form action="{{ route('pengiriman.tiba', $pesanan->id) }}" method="POST"
                              style="display: inline">
                              @csrf
                              @method('put')
                              <button type="submit" class="btn hadeh njir mt-3" data-original-title="Delete user"
                                data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pesanan->id }}">
                                <i class="fa-solid fa-check"></i>
                              </button>
                            </form>
                          @endif
                        </div>
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
              <a href="{{ route('shop.index') }}"
                class="custom-btn cart-btn-continue-shopping primary-btn cart-btn">Back</a>
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
                            <li>Total Quantity <span>{{ $pesanans->sum('jumlah') }}</span></li>
                            <li>Total <span>Rp. {{ number_format($subtotal, 0, ',', '.') }}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div> --}}
        </div>
      @else
        <h3 class="col-12 text-center mb-3">There are no order</h3>
        <div class="col-12 text-center">
          <a href="{{ route('shop.index') }}" class="btn primary-btn">Shop Now</a>
        </div>
      @endif
    </div>
  </section>
  <!-- Shoping Cart Section End -->
@endsection
