@extends('layouts.main-layout')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Statistik Penjualan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="#">Produk</a></li> --}}
            <li class="breadcrumb-item active">Statistik Penjualan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div> 
@endsection

@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{count($transaksis->where('status','selesai'))}}</h3>

            <p>Transaksi Selesai</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{count($transaksis->where('status','menunggu verifikasi'))}}</h3>

            <p>Menunggu Verifikasi Penjual</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{count($transaksis->where('status','belum dibayar'))}}</h3>

            <p>Transaksi Belum Dibayar</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{count($transaksis->where('status','dibatalkan'))}}</h3>

            <p>Transaksi Dibatalkan</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="row">
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ 'Rp ' . number_format($avg, 2, ',', '.') }}</h3>

            <p>Rata Rata Nilai Transaksi Selesai</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection