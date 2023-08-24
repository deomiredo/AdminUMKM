@extends('layouts.main-layout')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Analitik Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- {{-- <li class="breadcrumb-item"><a href="#">Produk</a></li> --}} -->
            <li class="breadcrumb-item active">Analitik Pelanggan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div> 
@endsection

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        
        <!-- /.card -->

        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">Data Pembeli dan Jumlah Transaksi</h3>
            {{-- <a class="item-right ml-auto btn btn-success btn-sm" href="{{ route('create-pembeli') }}"> Tambah</a> --}}
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>NO</th>
                <th>Nama Pembeli</th>
                <th>Jumlah Transaksi Dibatalkan</th>
                <th>Jumlah Transaksi Belum Dibayar</th>
                <th>Jumlah Transaksi Menunggu Verifikasi</th>
                <th>Jumlah Transaksi Selesai</th>
              </tr>
              </thead>
              <tbody>
                @foreach($transaksis as $transaksi)
                @foreach ($pembelis as $pembeli)
                    <tr>
                      <td>{{$pembeli->id}}</td>
                      <td>{{$pembeli->nama_lengkap}}</td>
                      <td>{{$transaksi->status}}</td>
                      {{-- <td>{{$pembeli->transaksi->status }}</td> --}}
                      <td>{{$pembeli->password}}</td>
                      <td>{{$pembeli->verifikasi}}</td>
                      <td>0</td>
                    </tr>
                @endforeach
                @endforeach
              </tbody>
              
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>  
@endsection