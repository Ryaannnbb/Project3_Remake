@extends('layout.app')

@section('content')
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <form role="form" action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Edit Payment</h6>
                                    <p class="text-sm">See information about all payment</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <button type="submit" method="POST"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--text"></span> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Payment Method</label>
                                        <input class="form-control  @error('metode_pembayaran') is-invalid @enderror"
                                            name="metode_pembayaran" type="text"
                                            value="{{ $pembayaran->metode_pembayaran }}" id="example-text-input">
                                        @error('metode_pembayaran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Account Number</label>
                                        <input class="form-control  @error('no_rekening') is-invalid @enderror"
                                            name="no_rekening" type="number" value="{{ $pembayaran->no_rekening }}"
                                            id="example-text-input">
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
