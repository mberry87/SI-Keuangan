@extends('layout.admin')
@section('title', 'Laporan')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Laporan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        {{-- @if (session('success'))
            <div class="alert alert-success" role="alert" style="width: 50%">
                {{ session('success') }}
            </div>
        @endif --}}
        <div class="card-header">
            <h3 class="card-title">Filter Laporan</h3>
        </div>
        <div class="card-body">
            <form action="/filter" method="GET">
                <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa fa-filter"></i> Filter</button>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="tanggal-mulai">Tanggal Mulai</label>
                            <div class="input-group date" id="tanggalMulai" data-target-input="nearest">
                                <input type="text" name="tanggal_mulai" id="tanggal_mulai"
                                    class="form-control datetimepicker-input" data-target="#tanggalMulai" required />
                                <div class="input-group-append" data-target="#tanggalMulai" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="tanggal-selesai">Tanggal Selesai</label>
                            <div class="input-group date" id="tanggalSelesai" data-target-input="nearest">
                                <input type="text" name="tanggal_selesai" id="tanggal_selesai"
                                    class="form-control datetimepicker-input" data-target="#tanggalSelesai" required />
                                <div class="input-group-append" data-target="#tanggalSelesai" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select class="form-control select2" required name="kategori_id" id="kategori_id"
                                style="width: 100%;">
                                <option value="">== Silahkan Pilih ==</option>
                                @foreach ($kategori as $kategoriData)
                                    <option value="{{ $kategoriData->id }}">{{ $kategoriData->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Hasil Filter Laporan</h3>
        </div>
        <div class="card-body">
            <div class="row mt-3">
                <div class="col">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Pendapatan</th>
                                <th>Pengeluaran</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $totalPendapatan = 0;
                                $totalPengeluaran = 0;
                            @endphp
                            @foreach ($transaksi as $transaksiData)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $transaksiData->tanggal }}</td>
                                    <td>{{ $transaksiData->kategori->nama }}</td>
                                    <td>
                                        @if ($transaksiData->jenis == 'pendapatan')
                                            {{ $transaksiData->nominal }}
                                            @php $totalPendapatan += $transaksiData->nominal; @endphp
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($transaksiData->jenis == 'pengeluaran')
                                            {{ $transaksiData->nominal }}
                                            @php $totalPengeluaran += $transaksiData->nominal; @endphp
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>{{ $transaksiData->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"><strong>Sub Total</strong></td>
                                <td><strong>{{ $totalPendapatan }}</strong></td>
                                <td><strong>{{ $totalPengeluaran }}</strong></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection
