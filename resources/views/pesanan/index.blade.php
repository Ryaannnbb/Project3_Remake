@extends('layout.app')

@section('content')
<div class="container-fluid py-4 px-5">
    <div class="row">
      <div class="col-12">
        <div class="card border shadow-xs mb-4">
          <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
              <div>
                <h6 class="font-weight-semibold text-lg mb-0">Category list</h6>
                <p class="text-sm">See information about all category</p>
              </div>
              <div class="ms-auto d-flex">
                <a href="{{ route('supplier.create') }}">
                    <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                      <span class="btn-inner--text">Add Supplier</span>
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
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">User</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Ordered Product</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Amount</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Total</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Action</th>
                  </tr>
                </thead>
                    <tbody>
                        @if ($pesanans->count() > 0)
                            @foreach ( $pesanans as $pesanan )
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold text-center">{{$loop->iteration}}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $pesanan->user ? $pesanan->user->name : 'User not found' }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{$pesanan->produk->nama_produk}}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{$pesanan->jumlah}}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{$pesanan->total}}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{ route('supplier.edit', $pesanan->id) }}" class="btn btn-secondary mb-n1 mt-n1 p-2" data-toggle="tooltip" data-original-title="Edit user">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <form id="deleteform{{ $pesanan->id }}" method="POST" action="{{ route('supplier.destroy', $pesanan->id) }}" style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-secondary mb-n1 mt-n1 p-2" data-bs-toggle="tooltip" data-original-title="Delete user">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
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
