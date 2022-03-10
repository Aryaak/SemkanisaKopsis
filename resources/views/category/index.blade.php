@extends('layouts.app')
@section('content')
@include('layouts.headers.blank')
    <!-- Header -->
    <div class="header bg-dark pb-6 mr--4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Kategori</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home text-warning"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <button type="button" class="btn btn-sm p-2 btn-warning" data-toggle="modal" data-target="#addNew" title="Create New category">Tambah Baru</button>
              {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
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
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="categorys" class="table table-stripped align-items-center table-flush p-10" style="width:100%">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="id">ID</th>
                    <th scope="col" class="sort" data-sort="name">Nama</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach ($category as $category)
                  <tr>
                      <td class="id">
                        <div class="media-body">{{$category->id}}</div>
                      </td>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{$category->name}}</span>
                        </div>
                      </div>
                    </th>
                    <td class="text-right">
                        <div class="row">
                            <a class="btn btn-sm btn-icon-only" style="color: #f48e5f;" data-toggle="modal" data-target="#Edit{{$category->id}}">
                            <img class="img-fluid" src="{{asset('img/icons/edit.svg')}}" alt="Ubah">
                            UBAH
                            </a>
                        </div>
                        <div class="row">
                            <form action="{{route('category.delete',$category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-icon-only" onclick="return confirm('Apakah anda yakin ingin menghapus?')" style="color: #f4645f;">
                                <img class="img-fluid" src="{{asset('img/icons/trash.svg')}}" alt="Hapus">
                                HAPUS
                            </button>
                        </form>
                        </div>
                    </td>
                  </tr>
                  <!-- Edit Modal -->
  <div class="float modal fade" id="Edit{{$category->id}}" tabindex="-1" aria-labelledby="Edit{{$category->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Edit{{$category->id}}Label">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('category.update',$category->id)}}">
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <input type="text" class="form-control col-sm-9" id="name" name="name" placeholder="Masukan Nama Kategori, contoh: Alat Tulis" value="{{$category->name}}" required autofocus>
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

    <!-- Add Modal -->
  <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addNewLabel">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('category.create')}}">
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <input type="text" class="form-control col-sm-9" id="name" name="name" placeholder="Masukan Nama Kategori, contoh: Alat Tulis" required autofocus>
                  <div id="name" class="invalid-feedback">
                    {{$errors->first('name')}}
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-warning">Tambah</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>
    $(document).ready( function () {
    $('#categorys').DataTable({
        "language":{
            "url":"https://cdn.datatables.net/plug-ins/1.11.4/i18n/id.json",
        }
    });
} );
</script>
@endpush

