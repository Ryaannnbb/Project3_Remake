@extends('layout.app')

@section('content')
<div class="container-fluid py-4 px-5">
    <div class="row">
      <div class="col-12">
        <div class="card border shadow-xs mb-4">
    <form role="form" action="{{ route('pembayaran.store') }}" method="POST">
        @csrf
          <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
              <div>
                <h6 class="font-weight-semibold text-lg mb-0">Members Category</h6>
                <p class="text-sm">See information about all category</p>
              </div>
              <div class="ms-auto d-flex">
                <button type="submit" action="{{ route('pembayaran.store') }}" method="POST" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                  <span class="btn-inner--text">Add Category</span>
                </button>
              </div>
            </div>
          </div>
          <div class="card-body px-0 py-0">
            <div class="table-responsive p-0">
                <div class="card-body">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Payment Method</label>
                            <input class="form-control  @error('metode_pembayaran') is-invalid @enderror" name="metode_pembayaran" type="text" value="{{ old('metode_pembayaran') }}" id="example-text-input">
                            @error('metode_pembayaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Account Number</label>
                            <input class="form-control  @error('no_rekening') is-invalid @enderror" name="no_rekening" type="number" value="{{ old('no_rekening') }}" id="example-text-input">
                            @error('no_rekening')
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
