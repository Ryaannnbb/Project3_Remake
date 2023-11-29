@extends('user.layouts.main')

@section('content')

@if (session('message'))
    <script>
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: '{{ session("message") }}'
        });
    </script>
@endif
    {{-- <style>
        .list{
            display: none;
        }
    </style> --}}
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-9">
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 class="font-weight-black text-dark display-6">Petshop</h2>
                        <h5 class="font-weight-black text-dark display-6 mt-3">Welcome to our Pet Shop! We provide a wide range of products and services for your beloved pets. Discover high-quality products and the best services for your furry friends here.</h5>                        {{-- <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Shop</span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Category</h4>
                            <ul>
                                <li class="active"><a href="{{ route('shop.index') }}">All</a></li>
                                @foreach ($kategoris as $kategori)
                                <li><a href="?category={{ $kategori->id }}">{{ $kategori->nama_kategori }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        {{-- <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-1.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-2.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-3.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-1.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-2.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-3.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                {{-- <div class="filter__sort">
                                    <span>Sort By</span>
                                    <form id="Filter">
                                        <select name="sort" id="sort-by" >
                                            <option value="default">Default</option>
                                            <option value="price-low">Price: Low to High</option>
                                            <option value="price-high">Price: High to Low</option>
                                        </select>
                                    </form>
                                </div> --}}
                            </div>
                            <div class="col-lg-4 col-md-3 offset-md-4">
                                <div class="filter__found text-right">
                                    <h6><span>{{ $produk->count() }}</span> Products found</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if ($produk->count() > 0)
                            @foreach ($produk as $pd)
                                <div class="col-lg-4 col-md-6 col-sm-6 " >
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ asset($pd->path_produk) }}">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="{{ route('shop.detail', $pd->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="#">{{ $pd->nama_produk }}</a></h6>
                                            <h5>Rp. {{ number_format($pd->harga, 0, ',', '.') }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="">
                        {{ $produk->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '#pagination-links a', function (e) {
                e.preventDefault();

                var page = $(this).attr('href').split('page=')[1];

                fetchProduks(page);
            });

            function fetchProduks(page) {
                $.ajax({
                    url: '/produk/fetch?page=' + page,
                    success: function (data) {
                        $('#produk-list').html(data);
                    },
                });
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script>
        $(document).ready(function(){
            $('#sort-by').change(function(){
                var form = document.getElementById('Filter');
                form.submit();
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            document.querySelectorAll('#sort-by').forEach(function(element) {
            element.style.display = 'none';
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            document.querySelectorAll('.nice-select').forEach(function(element) {
            element.style.display = 'block';
            });
        });
    </script> --}}
    <!-- Product Section End -->
@endsection
