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
              <h6 class="h2 text-white d-inline-block mb-0">Produk</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item" style="color: #f48e5f;"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Produk</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <button type="button" class="btn btn-sm p-2 btn-warning" data-toggle="modal" data-target="#addNew" title="Create New Product">Tambah Baru</button>
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
            {{-- @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif --}}
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
              <h3 class="mb-0">Produk</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="products" class="table table-stripped align-items-center table-flush p-10" style="width:100%">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="id">ID</th>
                    <th scope="col" class="sort" data-sort="name">Nama</th>
                    <th scope="col" class="sort" data-sort="category">Katergori</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">aksi</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach ($product as $product)
                  <tr>
                    <td class="id">
                      {{$product->id}}
                    </td>

                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{$product->name}}</span>
                        </div>
                      </div>
                    </th>
                    <td class="category">
                        {{$product->category_id}}
                    </td>
                    <td class="photo">
                      <img class="rounded" style="width: 100px;" src="{{asset('storage/'.$product->photo)}}" alt="test">
                    </td>
                    <td class="stock">
                      {{$product->stock}}
                    </td>
                    <td class="price">
                      {{$product->price}} IDR
                    </td>
                    <td class="text-break description">
                      {{$product->description}}
                    </td>
                    <td class="text-right">
                        <a class="btn btn-sm btn-icon-only" style="color: #f48e5f;" data-toggle="modal" data-target="#Edit{{$product->id}}">
                        <img class="img-fluid" src="{{asset('img/icons/edit.svg')}}" alt="Ubah">
                        </a>
                        <form action="{{route('product.update',$product->id)}}" method="post">
                            @csrf
                            <input style="display: none;" value="1" id="deleted" name="deleted">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <button type="submit" class="btn btn-sm btn-icon-only" onclick="return confirm('Apakah anda yakin ingin menghapus?')" style="color: #f4645f;">
                            <img class="img-fluid" src="{{asset('img/icons/trash.svg')}}" alt="Hapus">
                        </button>
                    </form>
                    </td>
                  </tr>
<!-- Edit Modal -->
  <div class="modal fade" id="Edit{{$product->id}}" tabindex="-1" aria-labelledby="Edit{{$product->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Edit{{$product->id}}Label">Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="{{route('product.update',$product->id)}}">
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <input type="text" class="form-control col-sm-9" id="name" name="name" placeholder="Nama Produk" value="{{$product->name}}" required autofocus>
                </div>
                <div class="form-group row">
                  <label for="category" class="col-sm-2 col-form-label">Kategori</label>
                  <select id="category" name="category_id" class="form-control col-sm-9" required>
                    <option value="">Pilih Kategori</option>
                    <option value="{{$product->category_id}}">test</option>
                  </select>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="custom-file col-sm-6">
                      <input accept="image/*" type="file" id="photo" class="custom-file-input form-control" name="photo" value="testtestbrobro" required>
                      <label class="custom-file-label" for="photo">Pilih Gambar</label>
                    </div>
                    <img id="preview" class="rounded ml-5" style="height: 100px;" src="{{$product->photo}}" alt="">
                    <div id="photo" class="invalid-feedback">
                        {{$errors->first('photo')}}
                      </div>
                  </div>
                <div class="form-group row">
                  <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                  <input type="text" class="form-control col-sm-9" id="stock" name="stock" onkeypress="return isNumberKey(event)" value="{{$product->stock}}"  placeholder="Masukan Jumlah Stok, Contoh: 123" required>
                </div>
                <div class="form-group row">
                  <label for="price" class="col-sm-2 col-form-label">Harga</label>
                  <input type="text" class="form-control col-sm-9" id="price" name="price" onkeypress="return isNumberKey(event)" value="{{$product->price}}" placeholder="Masukan Harga Produk, Contoh: 2500" required>
                </div>
                <div class="form-group">
                  <label for="description">Keterangan</label>
                  <textarea rows="3" class="form-control col-sm-11" id="description" name="description" placeholder="Keterangan Produk">{{$product->description}}</textarea>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
            <!-- Card footer -->
            {{-- <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div> --}}
          </div>
        </div>
      </div>
@include('layouts.footers.auth')
    </div>

    <!-- Add Modal -->
  <div class="modal fade" id="addNew" tabindex="-2" aria-labelledby="addNewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addNewLabel">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="{{route('product.create')}}">
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <input type="text" class="form-control col-sm-9" id="name" name="name" placeholder="Nama Produk" required autofocus>
                  <div id="name" class="invalid-feedback">
                    {{$errors->first('name')}}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
                  <select id="category_id" name="category_id" class="form-control col-sm-9" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                  <div id="category" class="invalid-feedback">
                    {{$errors->first('category_id')}}
                  </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="custom-file col-sm-6">
                      <input accept="image/*" type="file" id="photo" class="custom-file-input form-control" name="photo" value="testtestbrobro" required>
                      <label class="custom-file-label" for="photo">Pilih Gambar</label>
                    </div>
                    <img id="preview" class="rounded ml-5" style="height: 100px;" src="https://dummyimage.com/100x100/111/eee&text=preview" alt="">
                  </div>
                <div class="form-group row">
                  <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                  <input type="text" class="form-control col-sm-9" id="stock" name="stock" onkeypress="return isNumberKey(event)" placeholder="Masukan Jumlah Stok, Contoh: 123" required>
                  <div id="stock" class="invalid-feedback">
                    {{$errors->first('stock')}}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="price" class="col-sm-2 col-form-label">Harga</label>
                  <input type="text" class="form-control col-sm-9" id="price" name="price" onkeypress="return isNumberKey(event)" placeholder="Masukan Harga Produk, Contoh: 2500" required>
                  <div id="price" class="invalid-feedback">
                    {{$errors->first('price')}}
                  </div>
                </div>
                <div class="form-group">
                  <label for="description">Keterangan</label>
                  <textarea rows="3" class="form-control col-sm-11" id="description" name="description" placeholder="Keterangan Produk"></textarea>
                  <div id="description" class="invalid-feedback">
                    {{$errors->first('description')}}
                  </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
    <script src="{{ asset('argon/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{ asset('argon/vendor/chart.js/dist/Chart.extension.js')}}"></script>
     <!-- Argon Scripts -->
  <!-- Core -->
<script src="{{asset('argon/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('argon/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('argon/js/argon.js?v=1.2.0')}}"></script>
<!-- DataTable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready( function () {
    $('#products').DataTable();
} );
</script>

<script type="text/javascript">
photo.onchange = evt => {
  const [file] = photo.files
  if (file) {
    preview.src = URL.createObjectURL(file);
    photo.files = URL.createObjectURL(file);
  }
}
</script>
<script>
    function isNumberKey(evt)
			{
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode != 46 && charCode > 31
				&& (charCode < 48 || charCode > 57))
				return false;
				return true;
			}
</script>
@endpush

