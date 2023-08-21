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
                        <li class="breadcrumb-item"><a href="{{ route('kategori-produk') }}">Kategori Produk</a></li>
                        <li class="breadcrumb-item active">Edit Kategori Produk</li>
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
                    <h5 class="card-title">Edit Kategori Produk</h5>
                </div>
                <form action="{{ route('update-kategori-produk',$kategori_produk->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Masukan Kategori Produk" name="nama_kategori" value="{{ old('nama_kategori',$kategori_produk->nama_kategori) }}" required>
                                @error('nama_kategori')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mr-1">Submit</button>
                        <a href={{ route('kategori-produk') }} class="btn btn-default ">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
