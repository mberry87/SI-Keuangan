@extends('layout.admin')
@section('title', 'Kategori')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kategori</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
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
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp
                    @foreach ($kategori as $kategoriData)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $kategoriData->nama }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $kategoriData->id) }}" class="btn btn-info btn-sm mb-3"
                                    data-toggle="modal" data-dismiss="modal"
                                    data-target="#modal-editKategori{{ $kategoriData->id }}"><i class="fa fa-pen"></i>
                                    Edit</a>
                                <a href="{{ route('kategori.destroy', $kategoriData) }}"
                                    class="btn btn-danger btn-sm mb-3"><i class="fas fa-trash-alt"></i>
                                    Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('backend.kategori.create')

    @include('backend.kategori.edit')

@endsection
