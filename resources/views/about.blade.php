@extends('layouts.app')
@section('content')
@include('layouts.headers.blank')
    <!-- Header -->
    <div class="header bg-dark pb-6 mr--4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tentang</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              {{-- <button type="button" class="btn btn-sm p-2 btn-warning" data-toggle="modal" data-target="#addNew" title="Create New orderproduct">Tambah Baru</button> --}}
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
                <div class="fa">
                aplikasi ini dibuat oleh 2 orang yaitu Arya dan Tiar yang dimana aplikasi ini dimaksudkan untuk tugas sekolah yang akan membantu koperasi sekolah untuk menggunakan aplikasi ini dalam mengatur penjualan dalam koperasi sekolah
                </div>
                {{-- <a href="{{route('home')}}" class="btn btn-lg btn-warning mt-10">Kembali</a> --}}
        </div>
        </div>
      </div>
@include('layouts.footers.auth')
    </div>
@endsection

