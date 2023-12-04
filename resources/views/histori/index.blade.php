@extends('layout.app')

@section('content')
  @if (session('reject'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('reject') }}"
      });
    </script>
  @endif

  @if (session('acc'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('acc') }}"
      });
    </script>
  @endif

  <script></script>

  <div class="container-fluid py-4 px-5">
    <div class="row">
      <div class="col-12">
        <div class="card border shadow-xs mb-4">
          <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
              <div>
                <h6 class="font-weight-semibold text-lg mb-0">Order History</h6>
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
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">No
                    </th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">User
                    </th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Total
                    </th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status
                    </th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if ($histories->count() > 0)
                    @foreach ($histories as $pesanan)
                      <tr>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $pesanan->user->name }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">Rp.
                            {{ number_format($pesanan->total, 0, ',', '.') }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          @if ($pesanan->status == 'pending')
                            <span class="badge bg-warning text-dark">{{ ucfirst($pesanan->status) }}</span>
                          @elseif ($pesanan->status == 'waiting payment')
                            <span class="badge bg-warning text-dark">{{ ucfirst($pesanan->status) }}</span>
                          @elseif ($pesanan->status == 'rejected')
                            <span class="badge bg-danger">{{ ucfirst($pesanan->status) }}</span>
                          @elseif ($pesanan->status == 'paid')
                            <span class="badge bg-success text-dark">{{ ucfirst($pesanan->status) }}</span>
                          @elseif ($pesanan->status == 'shipped')
                            <span class="badge bg-warning text-dark">{{ ucfirst($pesanan->status) }}</span>
                          @elseif ($pesanan->status == 'delivered')
                            <span class="badge bg-success text-dark">{{ ucfirst($pesanan->status) }}</span>
                          @elseif ($pesanan->status == 'completed')
                            <span class="badge bg-success text-dark">{{ ucfirst($pesanan->status) }}</span>
                          @endif
                        </td>
                        <td class="align-middle text-center text-sm">
                          <a href="{{ url("pesanan/$pesanan->id/detail") }}" class="btn btn-info mb-n1 mt-n1 p-2">
                            Detail
                          </a>
                          @if ($pesanan->status == 'pending')
                            <form action="{{ route('pesanan.terima', $pesanan->id) }}" method="POST"
                              style="display: inline">
                              @csrf
                              <button type="button" class="btn btn-success btn-acc mb-n1 mt-n1 p-2" data-toggle="tooltip"
                                data-original-title="Edit user">
                                Accept
                              </button>
                            </form>
                            <button class="btn btn-danger mb-n1 mt-n1 p-2" data-bs-toggle="modal"
                              data-bs-target="#exampleModal{{ $pesanan->id }}">
                              Reject
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $pesanan->id }}" tabindex="-1"
                              aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <form class="modal-content" action="{{ route('pesanan.tolak', $pesanan->id) }}"
                                  method="POST">
                                  @csrf
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                      Reject Message</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <textarea name="pesan_tolak" id="" cols="30" rows="5" class="form-control">{{ old('pesan_tolak') }}</textarea>
                                    @error('pesan_tolak')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger btn-reject">Reject</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                            @error('pesan_tolak')
                              <script>
                                Swal.fire({
                                  icon: 'error',
                                  title: 'Error',
                                  text: '{{ $message }}'
                                });
                              </script>
                            @enderror
                          @elseif ($pesanan->status == 'paid')
                            <a href="{{ route('pengiriman.create', $pesanan->id) }}" class="btn btn-secondary mb-n1 mt-n1 p-2">Atur Pengiriman</a>
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

    <script>
      $('.btn-reject').click(function() {
        Swal.fire({
          title: "Apakah Anda yakin?",
          text: "Anda akan menolak pesanan ini. Tindakan ini tidak dapat dibatalkan!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, tolak!"
        }).then((result) => {
          if (result.isConfirmed) {
            $(this).closest('form').submit();
          }
        });
      });
    </script>
    <script>
      $('.btn-acc').click(function() {
        Swal.fire({
          title: "Apakah Anda yakin?",
          text: "Anda akan menerima pesanan ini. Tindakan ini tidak dapat dibatalkan!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, terima!"
        }).then((result) => {
          if (result.isConfirmed) {
            $(this).closest('form').submit();
          }
        });
      });
    </script>
    @include('layout.footer')
  </div>
  <!-- Button trigger modal -->
@endsection
