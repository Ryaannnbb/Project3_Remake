@extends('layout.app')

@section('content')
  @if (session('error'))
    <script>
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{ session('error') }}",
        footer: '<a href="#">Why do I have this issue?</a>'
      });
    </script>
  @endif
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
                <a href="{{ route('kategori.create') }}">
                  <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                    <span class="btn-inner--text">Add Category</span>
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
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Category</th>
                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($kategori->count() > 0)
                    @foreach ($kategori as $kg)
                      <tr>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold text-center">{{ $loop->iteration }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $kg->nama_kategori }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <a href="{{ route('kategori.edit', $kg->id) }}" class="btn btn-secondary mb-n1 mt-n1 p-2"
                            data-toggle="tooltip" data-original-title="Edit user">
                            <i class="fa-regular fa-pen-to-square"></i>
                          </a>
                          <form id="deleteform{{ $kg->id }}" method="POST"
                            action="{{ route('kategori.destroy', $kg->id) }}" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-secondary mb-n1 mt-n1 p-2" data-bs-toggle="tooltip"
                              data-original-title="Delete user">
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
