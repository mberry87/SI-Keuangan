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
        <div class="card-body">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm mb-3" data-toggle="modal"
                data-target="#modal-createKategori"><i class="fa fa-plus"></i> Tambah</a>
            <div class="row">
                <div class="col col-md-6">
                    <form action="{{ route('laporan.index') }}" method="get">
                        <div class="mb-3">
                            <label for="from_date" class="form-label">Dari Tanggal</label>
                            <input type="date" class="form-control" id="from_date" name="from_date"
                                value="{{ request('from_date') }}">
                        </div>
                        <div class="mb-3">
                            <label for="to_date" class="form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" id="to_date" name="to_date"
                                value="{{ request('to_date') }}">
                        </div>
                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori_id" name="kategori_id">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $kategoriData)
                                    <option value="{{ $kategoriData->id }}"
                                        {{ old('kategori_id', $kategoriData->kategori_id) == $kategoriData->id ? 'selected' : '' }}>
                                        {{ $kategoriData->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('laporan.index') }}" method="get">
                {{-- Form filter sama seperti sebelumnya --}}
            </form>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        {{-- Tambahkan kolom lain yang Anda butuhkan --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporan as $item)
                        <tr>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            {{-- Tambahkan kolom lain yang Anda butuhkan --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">Tidak ada laporan yang sesuai dengan filter yang diberikan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
