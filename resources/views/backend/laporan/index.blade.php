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
                @csrf
                <a href="{{ route('filter.index') }}" type="submit" class="btn btn-primary btn-sm mb-3"><i
                        class="fa fa-filter"></i>
                    Filter</a>
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

    @include('backend.filter.index')

@endsection
