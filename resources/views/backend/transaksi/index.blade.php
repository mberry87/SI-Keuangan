@extends('layouts.admin')
@section('title', 'Transaksi')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Transaksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Transaksi</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tabel Transaksi</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm mb-3" data-toggle="modal"
                data-target="#modal-createTransaksi"><i class="fa fa-plus"></i> Tambah</a>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Departemen</th>
                        <th>Kategori</th>
                        <th>Pendapatan</th>
                        <th>Pengeluaran</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $transaksiData)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaksiData->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $transaksiData->departemen->nama }}</td>
                            <td>{{ $transaksiData->kategori->nama }}</td>
                            <td>
                                @if ($transaksiData->jenis == 'pendapatan')
                                    {{ formatRupiah($transaksiData->nominal, true) }}
                                @else
                                    Rp. 0
                                @endif
                            </td>
                            <td>
                                @if ($transaksiData->jenis == 'pengeluaran')
                                    {{ formatRupiah($transaksiData->nominal, true) }}
                                @else
                                    Rp. 0
                                @endif
                            </td>
                            <td>{{ $transaksiData->keterangan }}</td>
                            <td>
                                <a href="{{ route('transaksi.edit', $transaksiData->id) }}" class="btn btn-info btn-sm"
                                    data-toggle="modal" data-dismiss="modal"
                                    data-target="#modal-editTransaksi{{ $transaksiData->id }}"><i class="fa fa-pen"></i>
                                    Edit</a>
                                <form action="{{ route('transaksi.destroy', $transaksiData->id) }}" method="POST"
                                    class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" id="btn-hapus">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('sweetalert::alert')

    @include('backend.transaksi.create')

    @include('backend.transaksi.edit')


@endsection
