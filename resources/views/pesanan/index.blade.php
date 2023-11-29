@extends('layout.app')

@section('content')
  <div class="container-fluid py-4 px-5">
    <div class="row">
      <div class="col-12">
        <div class="card border shadow-xs mb-4">
          <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
              <div>
                <h6 class="font-weight-semibold text-lg mb-0">Order list</h6>
                <p class="text-sm">See information about all order</p>
              </div>
              <div class="ms-auto d-flex">
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
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Total</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($pesanans->count() > 0)
                    @foreach ($pesanans as $pesanan)
                      <tr>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span
                            class="text-secondary text-xs font-weight-bold">{{ $pesanan->user_id ? $pesanan->user->name : 'User not found' }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">Rp.
                            {{ number_format($pesanan->total, 0, ',', '.') }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <a href="{{ url("pesanan/$pesanan->id/detail") }}" class="btn btn-secondary mb-n1 mt-n1 p-2" >
                            Detail
                          </a>
                          @if ($pesanan->status == 'menunggu')
                          <form action="{{ route('pesanan.terima', $pesanan->id) }}" method="POST" style="display: inline">
                            @csrf
                            <button class="btn btn-secondary mb-n1 mt-n1 p-2" data-toggle="tooltip"
                            data-original-title="Edit user">
                            Terima
                            </button>
                          </form>
                          <button type="submit" class="btn btn-secondary mb-n1 mt-n1 p-2"
                          data-original-title="Delete user" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pesanan->id }}">
                          Tolak
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $pesanan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <form class="modal-content" action="{{ route('pesanan.tolak', $pesanan->id) }}" method="POST">
                              @csrf
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan Tolak</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <textarea name="pesan_tolak" id="" cols="30" rows="5" class="form-control"></textarea>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Next</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        @endif
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
  <!-- Button trigger modal -->

@endsection
