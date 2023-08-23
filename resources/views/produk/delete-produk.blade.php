<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDeleteKategori{{ $produk->id }}">Hapus</button>

<div class="modal fade" id="modalDeleteKategori{{ $produk->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="text-center my-3">
                <i class="fa-5x fa-solid fa-trash-can mb-3" style="color: #dc3545"></i>
                <h4>Apakah Kamu Yakin Menghapus <strong> produk {{ $produk->nama_produk }}</strong> ini? </h4>
            </div>

            <div class="my-2 text-center">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cencel</button>

                <form class="d-inline" action="{{ route('destroy-produk', $produk->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>