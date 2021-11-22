@extends('layouts.app')
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
</head>
@section('content')
@include('layouts.headers.blank')
    <!-- Header -->
    <div class="header bg-dark pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Products</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item" style="color: #f48e5f;"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#addNew" title="Create New Product">New</a>
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
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Products</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="products" class="table table-stripped align-items-center table-flush p-10" style="width:100%">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="category">Category</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">

                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">Sepatu</span>
                        </div>
                      </div>
                    </th>
                    <td class="category">
                      Alas Kaki
                    </td>
                    <td class="photo">
                      <img class="rounded" style="width: 100px;" src="https://dummyimage.com/100x100/111/fff" alt="test">
                    </td>
                    <td class="stock">
                      5000 Units
                    </td>
                    <td class="price">
                      $2500 USD
                    </td>
                    <td class="description">
                      desc
                    </td>
                    <td class="text-right">
                      {{-- <div class="dropdown" title="Actions">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" style="color: #f48e5f;" data-toggle="modal" data-target="#edit">
                            <img class="img-fluid float-right" src="{{asset('public/img/icons/edit.svg')}}" alt="">
                            Edit
                            </a>
                            <a class="dropdown-item" style="color: #f4645f;" data-toggle="modal" data-target="#delete">
                            <img class="img-fluid float-right" src="{{asset('public/img/icons/trash.svg')}}" alt="">
                            Delete
                            </a>
                        </div>
                      </div> --}}
                      <span>
                        <a class="btn btn-sm btn-icon-only" style="color: #f48e5f;" data-toggle="modal" data-target="#edit">
                        <img class="img-fluid" src="{{asset('public/img/icons/edit.svg')}}" alt="">
                        </a>
                        <a class="btn btn-sm btn-icon-only" style="color: #f4645f;" data-toggle="modal" data-target="#delete">
                        <img class="img-fluid" src="{{asset('public/img/icons/trash.svg')}}" alt="">
                        </a>
                      </span>
                    </td>
                  </tr>

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
@endsection

@push('js')
    <script src="{{ asset('public/argon/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{ asset('public/argon/vendor/chart.js/dist/Chart.extension.js')}}"></script>
     <!-- Argon Scripts -->
  <!-- Core -->
<script src="{{asset('public/argon/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('public/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/argon/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('public/argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('public/argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('public/argon/js/argon.js?v=1.2.0')}}"></script>
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
    preview.src = URL.createObjectURL(file)
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
            <form>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <input type="text" class="form-control col-sm-9" id="name" placeholder="Example Name" required autofocus>
                </div>
                <div class="form-group row">
                  <label for="category" class="col-sm-2 col-form-label">Category</label>
                  <select id="category" class="form-control col-sm-9">
                    <option>Category</option>
                  </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Photo</label>
                    <div class="custom-file col-sm-6">
                      <input accept="image/*" type="file" id="photo" multiple class="custom-file-input form-control" id="photo">
                      <label class="custom-file-label" for="photo">Choose image</label>
                    </div>
                    <img id="preview" class="rounded ml-5" style="height: 100px;" src="https://dummyimage.com/100x100/111/eee&text=preview" alt="">
                  </div>
                <div class="form-group row">
                  <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                  <input type="text" class="form-control col-sm-9" id="stock" onkeypress="return isNumberKey(event)" placeholder="1234" required>
                </div>
                <div class="form-group row">
                  <label for="price" class="col-sm-2 col-form-label">Price</label>
                  <input type="text" class="form-control col-sm-9" id="price" onkeypress="return isNumberKey(event)" placeholder="1234" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea rows="3" class="form-control col-sm-11" id="description" placeholder="Example Description"></textarea>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-warning">Add</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editLabel">Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <input type="text" class="form-control col" id="name" placeholder="Example Name" required autofocus>
                </div>
                <div class="form-group row">
                  <label for="category" class="col-sm-2 col-form-label">Category</label>
                  <input type="text" class="form-control col" id="category" placeholder="Example Category" required>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Photo</label>
                    <div class="custom-file col-sm-6">
                      <input accept="image/*" type="file" id="photo" multiple class="custom-file-input form-control" id="photo">
                      <label class="custom-file-label" for="photo">Choose image</label>
                    </div>
                    <img id="preview" class="rounded ml-5" style="height: 100px;" src="https://dummyimage.com/100x100/111/eee&text=preview" alt="">
                </div>
                <div class="form-group row">
                  <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                  <input type="text" class="form-control col" id="stock" onkeypress="return isNumberKey(event)" placeholder="1234" required>
                </div>
                <div class="form-group row">
                  <label for="price" class="col-sm-2 col-form-label">Price</label>
                  <input type="text" class="form-control col" id="price" onkeypress="return isNumberKey(event)" placeholder="1234" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea rows="3" class="form-control" id="description" placeholder="Example Description"></textarea>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-warning">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
<div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteLabel">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h1>Are You Sure?</h1>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
