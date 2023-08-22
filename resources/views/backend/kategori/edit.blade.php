<!-- Modal Edit -->
@foreach ($kategori as $kategoriData)
    <div class="modal fade" id="modal-editKategori{{ $kategoriData->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Kategori</h4>
                </div>
                <form action="{{ route('kategori.update', $kategoriData->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ old('nama', $kategoriData->nama) }}" placeholder="masukkan nama kategori"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
