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
                    <h1 class="m-0">Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('list-produk') }}">Produk</a></li>
                        <li class="breadcrumb-item active">Edit Produk</li>
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
                    <h5 class="card-title">Edit Produk</h5>
                </div>
                <form action="{{ route('update-produk',$produk->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Masukan Nama Produk" name="nama_produk" value="{{ old('nama_produk',$produk->nama_produk) }}" required>
                                @error('nama_produk')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
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
                        </div>
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

                            <label for="harga" class="col-sm-2 col-form-label">Harga Produk</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="Masukan Harga Produk" name="harga" value="{{ old('harga') }}" required>
                                @error('harga')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="stok" class="col-sm-2 col-form-label">Stok Produk</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="Masukan Stok Produk" name="stok" value="{{ old('stok') }}">
                                @error('stok')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Produk</label>
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
                        <a href={{ route('list-produk') }} class="btn btn-default ">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
