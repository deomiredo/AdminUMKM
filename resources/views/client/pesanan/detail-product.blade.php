<div class="modal fade" id="modalViewProdukTransaksi{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="d-inline" action="{{ route('penjual.pesanan.updateStatus', $item->id) }}" method="POST">
                @csrf
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
                                <td>Rp. {{ $produk->pivot->jumlah * $produk->harga }}</td>
                            </tr>
                        @endforeach
                        <tr class="bg-primary">
                            <td colspan="3">Total Harga</td>
                            <td colspan="2">Rp. {{ $item->total_harga }}</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="DIBATALKAN" {{ $item->status == 'DIBATALKAN' ? 'selected' : '' }}>DIBATALKAN</option>
                        <option value="BELUM DIBAYAR" {{ $item->status == 'BELUM DIBAYAR' ? 'selected' : '' }}>BELUM DIBAYAR</option>
                        <option value="MENUNGGU VERIFIKASI" {{ $item->status == 'MENUNGGU VERIFIKASI' ? 'selected' : '' }}>MENUNGGU VERIFIKASI</option>
                        <option value="MENUJU ALAMAT" {{ $item->status == 'MENUJU ALAMAT' ? 'selected' : '' }}>MENUJU ALAMAT</option>
                        <option value="SELESAI" {{ $item->status == 'SELESAI' ? 'selected' : '' }}>SELESAI</option>
                    </select>                                                            
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Status</button>
            </div>
            </form>
        </div>
    </div>
</div>