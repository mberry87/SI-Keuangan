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
            <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#modal-create"><i
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
                    @foreach ($transaksi as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{{ $data->jenis }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->nominal }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>
                                <button class="btn btn-info btn-sm mb-3" data-toggle="modal" data-dismiss="modal"
                                    data-target="#modal-edit{{ $data->id }}"><i class="fa fa-pen"></i> Edit</button>
                                <a href="{{ route('kategori.destroy', $data) }}" class="btn btn-danger btn-sm mb-3"><i
                                        class="fas fa-trash-alt"></i>
                                    Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal create --}}
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Transaksi</h4>
                </div>
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                    data-target="#reservationdate" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected>== Silahkan Pilih ==</option>
                                <option>Pendapatan</option>
                                <option>Pengeluaran</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control select2" style="width: 100%;" name="kategori_id">
                                <option>== Silahkan Pilih ==</option>
                                @foreach ($kategori as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

@endsection
