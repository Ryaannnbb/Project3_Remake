@extends('layout.app')

@section('content')
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <form role="form" action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Edit Supplier</h6>
                                    {{-- <p class="text-sm">See information about all category</p> --}}
                                </div>
                                <div class="ms-auto d-flex">
                                    <button class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--text">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        <input class="form-control  @error('nama_supplier') is-invalid @enderror"
                                            name="nama_supplier" type="text" value="{{ $supplier->nama_supplier }}"
                                            id="example-text-input">
                                        @error('nama_supplier')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="example-text-input" class="form-control-label">Address</label>
                                        <input class="form-control  @error('alamat_supplier') is-invalid @enderror"
                                            name="alamat_supplier" type="text" value="{{ $supplier->alamat_supplier }}"
                                            id="example-text-input">
                                        @error('alamat_supplier')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="example-text-input" class="form-control-label">Phone</label>
                                        <input class="form-control  @error('nomor_telepon_supplier') is-invalid @enderror"
                                            name="nomor_telepon_supplier" type="number"
                                            value="{{ $supplier->nomor_telepon_supplier }}" id="example-text-input">
                                        @error('nomor_telepon_supplier')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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
