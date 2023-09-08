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
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="departemen">Departemen</label>
                            <select class="form-control select2bs4 @error('departemen') is-invalid @enderror"
                                name="departemen" id="departemen" style="width: 100%;">
                                <option value="">== Semua Departemen ==</option>
                                @foreach ($departemen as $departemenData)
                                    <option value="{{ $departemenData->id }}"
                                        {{ old('departemen') == $departemenData->id ? 'selected' : '' }}>
                                        {{ $departemenData->nama }}</option>
                                @endforeach
                            </select>
                            @error('departemen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include('backend.laporan.form_laporan')

@endsection
