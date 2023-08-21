{{-- modal edit --}}
@foreach ($transaksi as $transaksiData)
    <div class="modal fade" id="modal-editTransaksi{{ $transaksiData->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Transaksi</h4>
                </div>
                <form action="{{ route('transaksi.update', $transaksiData->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="tanggal" id="tanggal "
                                    value="{{ old('tanggal', $transaksiData->tanggal) }}"
                                    class="form-control datetimepicker-input" data-target="#reservationdate" required />
                                <div class="input-group-append" data-target="#reservationdate"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select class="form-control select2" name="jenis" id="jenis" style="width: 100%;">
                                <option value="">== Silahkan Pilih ==</option>
                                <option value="pendapatan"
                                    {{ old('jenis', $transaksiData->jenis) === 'pendapatan' ? 'selected' : '' }}>
                                    Pendapatan</option>
                                <option value="pengeluaran"
                                    {{ old('jenis', $transaksiData->jenis) === 'pengeluaran' ? 'selected' : '' }}>
                                    Pengeluaran</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control select2" name="kategori_id" id="kategori_id"
                                style="width: 100%;">
                                <option>== Silahkan Pilih ==</option>
                                @foreach ($kategori as $kategoriData)
                                    <option value="{{ $kategoriData->id }}"
                                        {{ old('kategori_id', $transaksiData->kategori_id) == $kategoriData->id ? 'selected' : '' }}>
                                        {{ $kategoriData->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" name="nominal" id="nominal" class="form-control"
                                value="{{ old('nominal', $transaksiData->nominal) }}" required data-type="currency"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukan keterangan ...">{{ old('keterangan', $transaksiData->keterangan) }}</textarea>
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
