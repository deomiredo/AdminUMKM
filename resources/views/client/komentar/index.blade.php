@extends('layouts.main-layout')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Komentar dan Penilaian</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Produk</a></li> --}}
                        <li class="breadcrumb-item active">Komentar dan Penilaian</li>
                    {{-- <h1 class="m-0">Komentar Dan Penilaian</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('penjual.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Komentar dan Penilaian</li>
                    </ol> --}}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <!-- /.card -->

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Komentar</h3>
                    {{-- <a class="item-right ml-auto btn btn-success btn-sm" href="{{ route('penjual.produk.create') }}"> Tambah</a> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Produk</th>
                                <th>Nama Pembeli</th>
                                <th>Penilaian</th>
                                <th>Komentar</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($komentars as $komentar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $komentar->produk->nama_produk }}</td>
                                    <td>{{ $komentar->pembeli->nama_lengkap }}</td>
                                    <td>{{ $komentar->penilaian }}</td>
                                    <td>{{ $komentar->komentar }}</td>
                                    <td>{{ $komentar->created_at->format('d M Y') }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>
@endsection
