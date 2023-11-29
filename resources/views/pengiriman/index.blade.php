@extends('layout.app')

@section('content')
<div class="container-fluid py-4 px-5">
    <div class="row">
      <div class="col-12">
        <div class="card border shadow-xs mb-4">
          <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
              <div>
                <h6 class="font-weight-semibold text-lg mb-0">Delivery list</h6>
                <p class="text-sm">See information about all Product</p>
              </div>
              <div class="ms-auto d-flex">
                <a href="{{ route('pengiriman.create') }}">
                    <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                      <span class="btn-inner--text">Add Shipping</span>
                    </button>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body px-0 py-0">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead class="bg-gray-100">
                  <tr>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">No</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Order</th>
                    {{-- <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status</th> --}}
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Date Delivery</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Date Received</th>
                  </tr>
                </thead>
                    <tbody>
                        @if ($pengirimans->count() > 0)
                            @foreach ( $pengirimans as $pengiriman )
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold text-center">{{$loop->iteration}}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span>{{ $pengiriman->pesanan->user->name }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span>{{ date('d F Y', strtotime( $pengiriman->tanggal_pengiriman)) }}</span>
                                </td>
                                @if ($pengiriman->tanggal_menerima != null)
                                <td class="align-middle text-center text-sm">
                                  <span>{{ date('d F Y', strtotime( $pengiriman->tanggal_menerima)) }}</span>
                                </td>
                                @else
                                <td class="align-middle text-center text-sm">-</td>
                                @endif
                                @if ($pengiriman->pesanan->status == 'dikirim')

                                <td class="align-middle text-center text-sm">
                                    {{-- <a href="{{ route('produk.edit', $pengiriman->id) }}" class="btn btn-secondary mb-n1 mt-n1 p-2" data-toggle="tooltip" data-original-title="Edit user">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a> --}}
                                    <form id="deleteform{{ $pengiriman->id }}" method="POST" action="{{ route('pengiriman.tiba', $pengiriman->pesanan->id) }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary mb-n1 mt-n1 p-2" data-bs-toggle="tooltip" data-original-title="Delete user">
                                            {{-- <i class="fa-solid fa-trash"></i> --}}
                                            arrive at the destination
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        @endif
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layout.footer')
  </div>
@endsection
