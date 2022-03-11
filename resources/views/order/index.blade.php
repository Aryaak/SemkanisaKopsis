@extends('layouts.app')
@section('content')
@include('layouts.headers.blank')
    <!-- Header -->
    <div class="header bg-dark pb-6 mr--4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Order</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home text-warning"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Order</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              {{-- <button type="button" class="btn btn-sm p-2 btn-warning" data-toggle="modal" data-target="#addNew" title="Create New order">Tambah Baru</button> --}}
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
              <table id="orders" class="table table-stripped align-items-center table-flush p-10" style="width:100%">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="id">ID</th>
                    <th scope="col" class="sort" data-sort="name">User</th>
                    <th scope="col" class="sort" data-sort="name">Pembayaran</th>
                    <th scope="col" class="sort" data-sort="name">Total</th>
                    <th scope="col" class="sort" data-sort="name">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach ($order as $order)
                  <tr>
                      <td class="id">
                        <div class="media-body">{{$order->id}}</div>
                      </td>
                      <th scope="row">
                          <div class="media align-items-center">
                              <div class="media-body">
                                  <span class="name mb-0 text-sm">{{$order->user->name}}</span>
                                </div>
                            </div>
                        </th>
                        <td class="payment_id">
                            <div class="media-body">{{$order->payment->name}}</div>
                        </td>
                        <td class="total">
                            <div class="media-body">{{$order->total}}</div>
                        </td>
                        <th class="status_id">
                            @if ($order->status_id != 2)
                                <div class="text-warning media-body">{{$order->status->name}}</div>
                            @else
                                <div class="text-success media-body">{{$order->status->name}}</div>
                            @endif
                        </th>
                    <td class="text-right">
                        <div class="media align-items-center">
                            @if ($order->status_id != 2)
                            <form action="{{route('order.update',$order->id)}}" method="post">
                                @csrf
                                <input style="display: none;" value="2" id="status_id" name="status_id">
                                <button type="submit" class="btn btn-sm btn-icon-only" onclick="return confirm('Apakah anda yakin ingin menandai order ini sebagai selesai?')" style="color: #6bf45f;">
                                    <img class="img-fluid" src="{{asset('img/icons/check-pending.svg')}}" alt="Check">
                                </button>
                            </form>
                            @else
                                {{-- <button class="btn btn-sm btn-icon-only disabled"> --}}
                                    <img class="img-fluid" src="{{asset('img/icons/check-success.svg')}}" alt="Check">
                                </button>
                            @endif
                        </div>
                    </td>
                  </tr>
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
    $('#orders').DataTable({
        "language":{
            "url":"https://cdn.datatables.net/plug-ins/1.11.4/i18n/id.json",
        }
    });
} );
</script>

@endpush

