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

            <!-- /.card -->

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Data Pesanan </h3>
                    <a class="item-right ml-auto btn btn-success btn-sm" href="{{ route('penjual.produk.create') }}"> Tambah</a>
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
                                <th>Total Harga</th>
                                <th>Metode Pembayaran</th>
                                <th>Status</th>
                                <th>Produk</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi->where('status','') as $item)
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
                                            detail product
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalViewProdukTransaksi{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table id="example1" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <td>NO</td>
                                                                    <td>Nama Produk</td>
                                                                    <td>harga produk</td>
                                                                    <td>jumlah produk</td>
                                                                    <td>total harga</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                                @foreach ($item->keranjang->produk as $produk)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $produk->nama_produk }}</td>
                                                                        <td>Rp. {{ $produk->harga }}</td>
                                                                        <td>{{ $produk->pivot->jumlah }}</td>
                                                                        <td>Rp. {{ $produk->pivot->jumlah*$produk->harga }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr class="bg-primary">
                                                                    <td colspan="3">Total Harga</td>
                                                                    <td colspan="2">Rp. {{ $item->total_harga }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul>

                                        </ul>
                                    </td>

                                    {{-- <td>{{ $produk->harga }}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td>{{ $produk->penjual->nama }}</td> --}}
                                    {{-- <td>
                                        <a href="{{ route('penjual.produk.edit',$produk->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @include('produk.delete-produk')
                                    </td> --}}
                                </tr>
                            @endforeach
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
                    <h3 class="card-title">Data Pesanan </h3>
                    <a class="item-right ml-auto btn btn-success btn-sm" href="{{ route('penjual.produk.create') }}"> Tambah</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nomor Transaksi</th>
                                <th>Nama Pembeli</th>
                                <th>Foto Pembeli</th>
                                <th>Total Harga</th>
                                <th>Metode Pembayaran</th>
                                <th>Status</th>
                                <th>Produk</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $item)
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
                                            detail product
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalViewProdukTransaksi{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table id="example1" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <td>NO</td>
                                                                    <td>Nama Produk</td>
                                                                    <td>harga produk</td>
                                                                    <td>jumlah produk</td>
                                                                    <td>total harga</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                                @foreach ($item->keranjang->produk as $produk)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $produk->nama_produk }}</td>
                                                                        <td>Rp. {{ $produk->harga }}</td>
                                                                        <td>{{ $produk->pivot->jumlah }}</td>
                                                                        <td>Rp. {{ $produk->pivot->jumlah*$produk->harga }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr class="bg-primary">
                                                                    <td colspan="3">Total Harga</td>
                                                                    <td colspan="2">Rp. {{ $item->total_harga }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul>

                                        </ul>
                                    </td>

                                    {{-- <td>{{ $produk->harga }}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td>{{ $produk->penjual->nama }}</td> --}}
                                    {{-- <td>
                                        <a href="{{ route('penjual.produk.edit',$produk->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @include('produk.delete-produk')
                                    </td> --}}
                                </tr>
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
@endsection

@section('script')
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
@endsection
