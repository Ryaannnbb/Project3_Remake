@extends('layout.app')

@section('content')
  <div class="container-fluid py-4 px-5">
    <div class="row">
      <div class="col-12">
        <div class="card border shadow-xs mb-4">
          <form role="form" action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Add Product</h6>
                  <p class="text-sm">See information about all category</p>
                </div>
                <div class="ms-auto d-flex">
                  <button type="submit" action="{{ route('kategori.store') }}" method="POST"
                    class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                    <span class="btn-inner--text">Submit</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="table-responsive p-0">
                <div class="card-body">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Product Image</label>
                    <input class="form-control  @error('path_produk') is-invalid @enderror" name="path_produk"
                      type="file" value="{{ old('nama_kategori') }}"
                      id="example-text-input">
                    @error('nama_kategori')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Product Name</label>
                    <input class="form-control  @error('nama_produk') is-invalid @enderror" name="nama_produk"
                      type="text" placeholder="Category Name" value="{{ old('nama_produk') }}"
                      id="example-text-input">
                    @error('nama_produk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Product Price</label>
                    <input class="form-control  @error('harga') is-invalid @enderror" name="harga"
                      type="text" placeholder="Price" value="{{ old('harga') }}"
                      id="example-text-input">
                    @error('harga')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description</label>
                    <textarea class="form-control  @error('deskripsi') is-invalid @enderror" name="deskripsi" type="text"
                      placeholder="Description" value="{{ old('deskripsi') }}" id="example-text-input"></textarea>
                    @error('deskripsi')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Category Name</label>
                    <select class="form-select  @error('kategori_id') is-invalid @enderror" name="kategori_id"
                      type="text" placeholder="Category Name" value="{{ old('kategori_id') }}"
                      id="example-text-input">
                      @foreach ($kategoris as $kategori)
                          <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                      @endforeach
                    </select>
                    @error('kategori_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Supplier</label>
                    <select class="form-select  @error('supplier_id') is-invalid @enderror" name="supplier_id"
                      type="text" placeholder="Category Name" value="{{ old('supplier_id') }}"
                      id="example-text-input">
                      @foreach ($suppliers as $supplier)
                          <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                      @endforeach
                    </select>
                    @error('supplier_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  @include('layout.footer')
  </div>
@endsection
