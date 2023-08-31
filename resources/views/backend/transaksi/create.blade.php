{{-- modal create --}}
<div class="modal fade" id="modal-createTransaksi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Transaksi</h4>
            </div>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <div class="input-group date" id="tanggalTransaksi" data-target-input="nearest">
                            <input type="text" name="tanggal" id="tanggal"
                                class="form-control datetimepicker-input @error('tanggal') is-invalid @enderror"
                                data-target="#tanggalTransaksi" value="{{ old('tanggal') }}" />
                            <div class="input-group-append" data-target="#tanggalTransaksi"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select class="form-control select2bs4 @error('jenis') is-invalid @enderror" name="jenis"
                            id="jenis" style="width: 100%;">
                            <option value="">== Silahkan Pilih ==</option>
                            <option value="pendapatan" {{ old('jenis') == 'pendapatan' ? 'selected' : '' }}>Pendapatan
                            </option>
                            <option value="pengeluaran" {{ old('jenis') == 'pengeluaran' ? 'selected' : '' }}>
                                Pengeluaran</option>
                        </select>
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control select2bs4 @error('kategori_id') is-invalid @enderror"
                            name="kategori_id" id="kategori_id" style="width: 100%;">
                            <option value="">== Silahkan Pilih ==</option>
                            @foreach ($kategori as $kategoriData)
                                <option value="{{ $kategoriData->id }}"
                                    {{ old('kategori_id') == $kategoriData->id ? 'selected' : '' }}>
                                    {{ $kategoriData->nama }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="text" name="nominal" id="rupiah"
                            class="form-control @error('nominal') is-invalid @enderror" value="{{ old('nominal') }}">
                        @error('nominal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control  @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan"
                            rows="3" placeholder="Masukan keterangan ...">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
