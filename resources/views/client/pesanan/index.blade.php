@extends('layouts.main-layout')

@section('css')
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Produk</a></li> --}}
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Data Pesanan </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nomor Transaksi</th>
                                <th>Nama Pembeli</th>

                                <th>Foto Pembeli</th>
                                <th>Bukti Transfer</th>


                                <th>Total Harga</th>
                                <th>Metode Pembayaran</th>
                                <th>Status</th>
                                <th>Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksi->whereNotIn('status',['DIBATALKAN','dibatalkan','SELESAI','selesai']) as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->keranjang->pembeli->nama_lengkap }}</td>
                                    <td><a href="{{ $item->keranjang->pembeli->foto }}" target="_blank">lihat gambar</a> </td>
                                    <td><a href="{{ $item->bukti}}" target="_blank">lihat gambar</a></td>
                                    <td>{{ $item->total_harga }}</td>
                                    <td>{{ $item->metode_pembayaran }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalViewProdukTransaksi{{ $item->id }}">
                                            detail
                                        </button>

                                        <!-- Modal -->
                                        @include('client.pesanan.detail-product')
                                        <ul>

                                        </ul>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-12">

            <!-- /.card -->

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Riwayat Pesanan </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nomor Transaksi</th>
                                <th>Nama Pembeli</th>
                                <th>Bukti Pembayaran</th>
                                <th>Total Harga</th>
                                <th>Metode Pembayaran</th>
                                <th>Status</th>
                                <th>Produk</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksi->whereIn('status', ['DIBATALKAN','dibatalkan','SELESAI','selesai']) as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->keranjang->pembeli->nama_lengkap }}</td>
                                    <td><a href="{{ $item->keranjang->pembeli->foto }}" target="_blank">lihat gambar</a> </td>
                                    <td>{{ $item->total_harga }}</td>
                                    <td>{{ $item->metode_pembayaran }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalViewProdukTransaksi{{ $item->id }}">
                                            detail
                                        </button>

                                        <!-- Modal -->
                                        @include('client.pesanan.detail-product')
                                        <ul>

                                        </ul>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
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
@endsection

{{-- @section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(1)');
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });
        });
    </script>
@endsection --}}