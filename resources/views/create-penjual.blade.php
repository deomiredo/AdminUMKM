@extends('layouts.main-layout')



@section('script')
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
            bsCustomFileInput.init();
            // CodeMirror

        })
    </script>
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Penjual</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('penjual') }}">Penjual</a></li>
                        <li class="breadcrumb-item active">Tambah Penjual</li>
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
                <div class="card-header">
                    <h5 class="card-title">Tambah Penjual</h5>
                </div>
                <form action="{{ route('store-penjual') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{-- <div class="form-group row">
                            <label for="id_kategori_produk" class="col-sm-2 col-form-label">Pilih Penjual</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="id_penjual" >
                                    <option selected value="{{ null }}">Open this select menu</option>
                                    @foreach ($penjuals as $penjual)
                                        <option value="{{ $penjual->id }}">{{ $penjual->nama_toko }} | {{ $penjual->nama }}</option>
                                    @endforeach
                                </select>

                                @error('id_penjual')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div> --}}
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Penjual</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Masukan Nama Penjual" name="nama" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="nama_produk" class="col-sm-2 col-form-label">Gambar Produk</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                @error('gambar')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div> --}}
                        {{-- <div class="form-group row">
                            <label for="id_kategori_produk" class="col-sm-2 col-form-label">Kategori Produk</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="id_kategori_produk" >
                                    <option selected value="{{ null }}">Open this select menu</option>
                                    @foreach ($kategori_produks as $kategori_produk)
                                        <option value="{{ $kategori_produk->id }}">{{ $kategori_produk->nama_kategori }}</option>
                                    @endforeach
                                </select>

                                @error('id_kategori_produk')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                        </div> --}}
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Masukan Username" name="username" value="{{ old('username') }}" required>
                                @error('username')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="Masukan Nomor HP" name="no_hp" value="{{ old('no_hp') }}">
                                @error('no_hp')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pin" class="col-sm-2 col-form-label">PIN</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="Masukan Pin untuk Login" name="pin" value="{{ old('pin') }}">
                                @error('pin')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-sm-2 col-form-label">Logo Toko</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="logo">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                @error('logo')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="nama_toko" class="col-sm-2 col-form-label">Nama Toko</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukan Nama Toko" name="nama_toko" value="{{ old('nama_toko') }}">
                            @error('nama_toko')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_bank" class="col-sm-2 col-form-label">Nama Bank</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukan Nama bank" name="nama_bank" value="{{ old('nama_bank') }}">
                            @error('nama_bank')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_rekening" class="col-sm-2 col-form-label">Nomor Rekening</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="Masukan No Rekening" name="no_rekening" value="{{ old('no_rekening') }}">
                            @error('no_rekening')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="atas_nama" class="col-sm-2 col-form-label">Atas Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Masukan Atas Nama dari Nomor Rekening" name="atas_nama" value="{{ old('atas_nama') }}">
                            @error('atas_nama')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Toko</label>
                            <div class="col-sm-10">
                                <textarea id="summernote" name="deskripsi" required>
                                    {{ old('deskripsi') }}
                                  </textarea>
                                @error('deskripsi')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mr-1">Submit</button>
                        <a href={{ route('penjual') }} class="btn btn-default ">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
