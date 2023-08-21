@extends('layout.admin')
@section('title', 'Transaksi')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Transaksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Transaksi</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#modal-createTransaksi"><i
                    class="fa fa-plus"></i> Tambah</button>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Kategori</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp
                    @foreach ($transaksi as $transaksiData)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $transaksiData->tanggal }}</td>
                            <td>{{ $transaksiData->jenis }}</td>
                            <td>{{ $transaksiData->kategori->nama }}</td>
                            <td>{{ $transaksiData->nominal }}</td>
                            <td>{{ $transaksiData->keterangan }}</td>
                            <td>
                                <button class="btn btn-info btn-sm mb-3" data-toggle="modal" data-dismiss="modal"
                                    data-target="#modal-editTransaksi{{ $transaksiData->id }}"><i class="fa fa-pen"></i>
                                    Edit</button>
                                <a href="{{ route('transaksi.destroy', $transaksiData) }}"
                                    class="btn btn-danger btn-sm mb-3"><i class="fas fa-trash-alt"></i>
                                    Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="tanggal" id="tanggal"
                                    class="form-control datetimepicker-input" data-target="#reservationdate" required />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select class="form-control select2" name="jenis" id="jenis" style="width: 100%;">
                                <option>== Silahkan Pilih ==</option>
                                <option value="pendapatan">Pendapatan</option>
                                <option value="pengeluaran">Pengeluaran</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control select2" name="kategori_id" id="kategori_id" style="width: 100%;">
                                <option>== Silahkan Pilih ==</option>
                                @foreach ($kategori as $kategoriData)
                                    <option value="{{ $kategoriData->id }}">{{ $kategoriData->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" name="nominal" id="nominal" class="form-control"
                                value="{{ old('nominal') }}" required data-type="currency" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukan keterangan ..."></textarea>
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
                                        value="{{ $transaksiData->tanggal }}" class="form-control datetimepicker-input"
                                        data-target="#reservationdate" required />
                                    <div class="input-group-append" data-target="#reservationdate"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select class="form-control select2" name="jenis" id="jenis" style="width: 100%;">
                                    <option>== Silahkan Pilih ==</option>
                                    <option value="pendapatan"
                                        {{ $transaksiData->jenis === 'pendapatan' ? 'selected' : '' }}>
                                        Pendapatan</option>
                                    <option
                                        value="pengeluaran"{{ $transaksiData->jenis === 'pengeluaran' ? 'selected' : '' }}>
                                        Pengeluaran</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control select2" name="kategori_id" id="kategori_id"
                                    style="width: 100%;">
                                    <option>== Silahkan Pilih ==</option>
                                    @foreach ($kategori as $kategoriData)
                                        <option value="{{ $kategoriData->id }}">
                                            {{ $kategoriData->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="text" name="nominal" id="nominal" class="form-control"
                                    value="{{ old('nominal') }}" required data-type="currency" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3"
                                    placeholder="Masukan keterangan ...">{{ $transaksiData->keterangan }}</textarea>
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


@endsection
