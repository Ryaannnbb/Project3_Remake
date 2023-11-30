@extends('user.layouts.main')

@section('content')

  @if (session('message'))
    <script>
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: '{{ session('message') }}'
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
      <div class="hero__search d-flex justify-content-center">
        <div class="hero__search__form">
          <form action="">
            <input type="text" name="search" placeholder="What do yo u need?">
            <button type="submit" class="site-btn">SEARCH</button>
          </form>
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
            <h5 class="font-weight-black text-dark display-6 mt-3">Welcome to our Pet Shop! We provide a wide range of
              products and services for your beloved pets. Discover high-quality products and the best services for your
              furry friends here.</h5> {{-- <div class="breadcrumb__option">
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
                  <li><a href="#" class="category-link" data-category="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-7">
          <div class="filter__item">
            <div class="row">
              <div class="col-lg-4 col-md-5">
                <div class="filter__sort">
                  {{-- <span>Sort By</span>
                                    <form id="Filter">
                                        <select name="sort" id="sort-by" >
                                            <option value="default">Default</option>
                                            <option value="price-low">Price: Low to High</option>
                                            <option value="price-high">Price: High to Low</option>
                                        </select>
                                    </form> --}}
                </div>
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
                <div class="col-lg-4 col-md-6 col-sm-6 ">
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
    $(document).ready(function() {
      $(document).on('click', '#pagination-links a', function(e) {
        e.preventDefault();

        var page = $(this).attr('href').split('page=')[1];

        fetchProduks(page);
      });

      function fetchProduks(page) {
        $.ajax({
          url: '/produk/fetch?page=' + page,
          success: function(data) {
            $('#produk-list').html(data);
          },
        });
      }
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(document).ready(function() {
      $('#sort-by').change(function() {
        var form = document.getElementById('Filter');
        form.submit();
      });
    })
  </script>
  <script>
    $(document).ready(function() {
      document.querySelectorAll('#sort-by').forEach(function(element) {
        element.style.display = 'block';
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      document.querySelectorAll('.nice-select').forEach(function(element) {
        element.style.display = 'none';
      });
    });
  </script>

<script>
    $(document).ready(function () {
        // Tambahkan parameter kategori ke URL saat mengklik tautan kategori
        $('.category-link').on('click', function (e) {
            e.preventDefault();
            var category = $(this).data('category');
            addParameter('kategori', category);
        });

        // Tambahkan parameter pencarian ke URL saat mengklik tautan pencarian
        $('.search-link').on('click', function (e) {
            e.preventDefault();
            var search = $(this).data('search');
            addParameter('search', search);
        });

        // Fungsi untuk menambahkan parameter ke URL menggunakan Ajax
        function addParameter(key, value) {
            $.ajax({
                type: 'GET',
                url: '/add-parameter', // Ganti dengan URL endpoint yang sesuai di server Anda
                data: {
                    key: key,
                    value: value
                },
                success: function () {
                    // Lakukan sesuatu setelah parameter ditambahkan (opsional)
                    console.log('Parameter ditambahkan!');
                },
                error: function () {
                    console.error('Gagal menambahkan parameter.');
                }
            });
        }
    });
</script>
  <!-- Product Section End -->
@endsection
