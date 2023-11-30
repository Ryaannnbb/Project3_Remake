@extends('layout.app')

@section('content')
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Orders Detail</h6>
                                <p class="text-sm">See information about all category</p>
                            </div>
                            <div class="ms-auto d-flex">
                                <a href="{{ route('pesanan.index') }}">
                                    <button type="button"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--text">Back</span>
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
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">No
                                        </th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                            Product Image</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                            Product Name</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                            Quantity</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Total
                                        </th>
                                        {{-- <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pesanans->count() > 0)
                                        @foreach ($pesanans as $pesanan)
                                            <tr>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                                                </td>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        <img src="{{ asset($pesanan->produk->path_produk) }}" alt=""
                                                            style="width: 150px;">
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $pesanan->produk->nama_produk }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $pesanan->jumlah }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">Rp.
                                                        {{ number_format($pesanan->total, 0, ',', '.') }}</span>
                                                </td>
                                            {{--<td class="align-middle text-center text-sm">
                                                    <a class="btn btn-secondary mb-n1 mt-n1 p-2" data-original-title="Delete user"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Detail
                                                    </a>
                                                    <a href="" class="btn btn-secondary mb-n1 mt-n1 p-2" data-toggle="tooltip"
                                                        data-original-title="Edit user">
                                                        Terima
                                                    </a>
                                                    <button type="submit" class="btn btn-secondary mb-n1 mt-n1 p-2"
                                                        data-original-title="Delete user" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Tolak
                                                    </button>
                                                </td> --}}
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" action="" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan Tolak</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea name="pesan" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </form>
        </div>
    </div>
@endsection
