@extends('layout.app')

@section('content')
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <form role="form" action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Members Category</h6>
                                    <p class="text-sm">See information about all category</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <button type="submit" action="{{ route('kategori.store') }}" method="POST"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--text">Add Category</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Category Name</label>
                                        <input class="form-control  @error('nama_kategori') is-invalid @enderror"
                                            name="nama_kategori" type="text" placeholder="Category Name"
                                            value="{{ old('nama_kategori') }}" id="example-text-input">
                                        @error('nama_kategori')
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
