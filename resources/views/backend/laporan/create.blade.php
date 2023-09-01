@extends('layouts.admin')
@section('title', 'Laporan')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Laporan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Laporan</h3>
        </div>
        <form action="{{ route('laporan.filter') }}" method="GET">
            <div class="card-body">
                <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa fa-filter"></i>
                    Laporan</button>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="tanggal-mulai">Tanggal Mulai</label>
                            <div class="input-group date" id="tanggalMulai" data-target-input="nearest">
                                <input type="text" name="tanggal_mulai" id="tanggal_mulai"
                                    class="form-control datetimepicker-input @error('tanggal_mulai') is-invalid @enderror"
                                    data-target="#tanggalMulai" value="{{ old('tanggal_mulai') }}" />
                                <div class="input-group-append" data-target="#tanggalMulai" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="tanggal-selesai">Tanggal Selesai</label>
                            <div class="input-group date" id="tanggalSelesai" data-target-input="nearest">
                                <input type="text" name="tanggal_selesai" id="tanggal_selesai"
                                    class="form-control datetimepicker-input @error('tanggal_selesai') is-invalid @enderror"
                                    data-target="#tanggalSelesai" value="{{ old('tanggal_selesai') }}" />
                                <div class="input-group-append" data-target="#tanggalSelesai" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    @if ($hasilLaporan)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hasil Laporan</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('laporan.form_pdf', ['tanggal_mulai' => $tanggal_mulai, 'tanggal_selesai' => $tanggal_selesai]) }}"
                    type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa fa-print"></i>
                    Cetak Laporan</a>
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Pendapatan</th>
                            <th>Pengeluaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalPendapatan = 0;
                            $totalPengeluaran = 0;
                        @endphp
                        @foreach ($transaksi as $transaksiData)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($transaksiData->tanggal)->format('d-m-Y') }}
                                </td>
                                <td>{{ $transaksiData->kategori->nama }}</td>
                                <td>{{ $transaksiData->keterangan }}</td>
                                <td>
                                    @if ($transaksiData->jenis == 'pendapatan')
                                        {{ formatRupiah($transaksiData->nominal, true) }}
                                        @php $totalPendapatan += $transaksiData->nominal; @endphp
                                    @else
                                        Rp. 0
                                    @endif
                                </td>
                                <td>
                                    @if ($transaksiData->jenis == 'pengeluaran')
                                        {{ formatRupiah($transaksiData->nominal, true) }}
                                        @php $totalPengeluaran += $transaksiData->nominal; @endphp
                                    @else
                                        Rp. 0
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-center"><strong>Sub Total</strong></td>
                            <td><strong>{{ formatRupiah($totalPendapatan, true) }}</strong></td>
                            <td><strong>{{ formatRupiah($totalPengeluaran, true) }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endif

@endsection
