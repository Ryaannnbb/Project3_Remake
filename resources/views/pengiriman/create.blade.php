@extends('layout.app')

@section('content')
  <div class="container-fluid py-4 px-5">
    <div class="row">
      <div class="col-12">
        <div class="card border shadow-xs mb-4">
          <form role="form" action="{{ route('pengiriman.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Add Delivery</h6>
                  <p class="text-sm">See information about all delivery</p>
                </div>
                <div class="ms-auto d-flex">
                  <button type="submit" method="POST"
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
                    <label for="example-text-input" class="form-control-label">Customer Name</label>
                    <select class="form-select  @error('pesanan') is-invalid @enderror" name="pesanan" type="text"
                      value="{{ old('pesanan') }}" id="example-text-input">
                      @foreach ($pesanan as $ps)
                        <option value="{{ $ps->id }}">{{ $ps->user->name }}</option>
                      @endforeach
                    </select>
                    @error('pesanan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Date Delivery</label>
                    <input type="date" class="form-control" name="tanggal_pengiriman">
                    @error('tanggal_pengiriman')
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

@section('script')
  <script>
    const imageInput = document.getElementById('imageInput')
    const imagePreview = document.getElementById('preview-image')
    imageInput.onchange = evt => {
      const [file] = imageInput.files
      if (file) {
        imagePreview.src = URL.createObjectURL(file)
      }
    }
  </script>
@endsection
