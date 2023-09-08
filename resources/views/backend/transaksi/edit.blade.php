@foreach ($transaksi as $transaksiData)
    <div class="modal fade" id="modal-editTransaksi{{ $transaksiData->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Transaksi</h4>
                </div>
                <form action="{{ route('transaksi.update', $transaksiData->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <div class="input-group date" id="tanggalTransaksiEdit" data-target-input="nearest">
                                <input type="text" name="tanggal" id="tanggal"
                                    class="form-control datetimepicker-input" data-target="#tanggalTransaksiEdit"
                                    value="{{ old('tanggal', $transaksiData->tanggal) }}" />
                                <div class="input-group-append" data-target="#tanggalTransaksiEdit"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departemen">Depertemen</label>
                            <select class="form-control select2bs4" name="departemen_id" id="departemen_idEdit"
                                style="width: 100%;">
                                @foreach ($departemen as $departemenData)
                                    <option value="{{ $departemenData->id }}"
                                        {{ old('departemen_id', $transaksiData->departemen_id) == $departemenData->id ? 'selected' : '' }}>
                                        {{ $departemenData->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select class="form-control select2bs4" name="jenis" id="jenisEdit" style="width: 100%;">
                                <option value="pendapatan"
                                    {{ old('jenis', $transaksiData->jenis) === 'pendapatan' ? 'selected' : '' }}>
                                    Pendapatan
                                </option>
                                <option value="pengeluaran"
                                    {{ old('jenis', $transaksiData->jenis) === 'pengeluaran' ? 'selected' : '' }}>
                                    Pengeluaran</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control select2bs4" name="kategori_id" id="kategori_idEdit"
                                style="width: 100%;">
                                @foreach ($kategori as $kategoriData)
                                    <option value="{{ $kategoriData->id }}"
                                        {{ old('kategori_id', $transaksiData->kategori_id) == $kategoriData->id ? 'selected' : '' }}>
                                        {{ $kategoriData->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" name="nominal" class="form-control rupiahEdit"
                                value="{{ old('nominal', $transaksiData->nominal) }}">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keteranganEdit" rows="3"
                                placeholder="Masukkan keterangan ...">{{ old('keterangan', $transaksiData->keterangan) }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
