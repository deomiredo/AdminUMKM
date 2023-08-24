@extends('layouts.main-layout')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Produk</a></li> --}}
                        <li class="breadcrumb-item active">Kategori Produk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
      <div class="col-12">
          @if (session()->has('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif

            <!-- /.card -->

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Data Kategori Produk </h3>
                    <a class="item-right ml-auto btn btn-success btn-sm" href="{{ route('create-kategori-produk') }}"> Tambah</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Kategori Produk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori_produks as $kategori_produk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kategori_produk->nama_kategori }}</td>
                                    <td>
                                      <a href="{{ route('edit-kategori-produk',$kategori_produk->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                      {{-- <form action="{{ route('destroy-kategori-produk',$kategori_produk->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                      </form> --}}
                                      @include('produk.delete-kategori-produk')
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
