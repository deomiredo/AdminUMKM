@extends('layouts.main-layout')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manajemen Penjual</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Produk</a></li> --}}
                        <li class="breadcrumb-item active">Manajemen Penjual</li>
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
                            <h3 class="card-title">Data Penjual</h3>
                            <a class="item-right ml-auto btn btn-success btn-sm" href="{{ route('create-penjual') }}"> Tambah</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Penjual</th>
                                        <th>No. HP</th>
                                        <th>Nama Toko</th>
                                        <th>Logo Toko</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penjuals as $penjual)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penjual->nama }}</td>
                                            <td>{{ $penjual->no_hp }}</td>
                                            <td>{{ $penjual->nama_toko }}</td>
                                            <td><a href="{{ $penjual->logo }}" target="_blank">lihat gambar</a> </td>
                                            <td>
                                              <a href="{{ route('edit-penjual',$penjual->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                              @include('penjual.delete-penjual') 
                                            </td>
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
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
