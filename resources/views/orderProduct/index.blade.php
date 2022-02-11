@extends('layouts.app')
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
</head>
@section('content')
@include('layouts.headers.blank')
    <!-- Header -->
    <div class="header bg-dark pb-6 mr--4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Produk Order</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item" style="color: #f48e5f;"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Produk Order                                                                                         </li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              {{-- <button type="button" class="btn btn-sm p-2 btn-warning" data-toggle="modal" data-target="#addNew" title="Create New orderproduct">Tambah Baru</button> --}}
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
            @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show">
                {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
          <div class="card pl-3 pr-3 pb-3">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">orderproduct</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="orderproducts" class="table table-stripped align-items-center table-flush p-10" style="width:100%">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="id">ID</th>
                    <th scope="col" class="sort" data-sort="name">Nama</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach ($orderproduct as $orderproduct)
                  <tr>
                      <td class="id">
                        <div class="media-body">{{$orderproduct->id}}</div>
                      </td>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{$orderproduct->name}}</span>
                        </div>
                      </div>
                    </th>
                    <td class="text-right">
                        <a class="btn btn-sm btn-icon-only" style="color: #f48e5f;" data-toggle="modal" data-target="#Edit{{$orderproduct->id}}">
                        <img class="img-fluid" src="{{asset('public/img/icons/edit.svg')}}" alt="Ubah">
                        </a>
                        <form action="{{route('orderproduct.update',$orderproduct->id)}}" method="post">
                            @csrf
                            <input style="display: none;" value="1" id="deleted" name="deleted">
                            <button type="submit" class="btn btn-sm btn-icon-only" onclick="return confirm('Apakah anda yakin ingin menghapus?')" style="color: #f4645f;">
                            <img class="img-fluid" src="{{asset('public/img/icons/trash.svg')}}" alt="Hapus">
                        </button>
                    </form>
                    </td>
                  </tr>
                  <!-- Edit Modal -->
  <div class="float modal fade" id="Edit{{$orderproduct->id}}" tabindex="-1" aria-labelledby="Edit{{$orderproduct->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Edit{{$orderproduct->id}}Label">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('orderproduct.update',$orderproduct->id)}}">
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <input type="text" class="form-control col-sm-9" id="name" name="name" placeholder="Masukan Nama orderproduct, contoh: Pending, Succsess" value="{{$orderproduct->name}}" required autofocus>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
            </form>
        </div>
      </div>
    </div>
  </div>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@include('layouts.footers.auth')
    </div>
@endsection

@push('js')
<script>
    $(document).ready( function () {
    $('#orderproducts').DataTable({
        "language":{
            "url":"https://cdn.datatables.net/plug-ins/1.11.4/i18n/id.json",
        }
    });
} );
</script>

@endpush

