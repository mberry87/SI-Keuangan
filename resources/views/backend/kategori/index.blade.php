@extends('layouts.admin')
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
        <div class="card-header">
            <h3 class="card-title">Tabel Kategori</h3>
        </div>
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
                    @foreach ($kategori as $kategoriData)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategoriData->nama }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $kategoriData->id) }}" class="btn btn-info btn-sm"
                                    data-toggle="modal" data-dismiss="modal"
                                    data-target="#modal-editKategori{{ $kategoriData->id }}"><i class="fa fa-pen"></i>
                                    Edit</a>
                                <form action="{{ route('kategori.destroy', $kategoriData->id) }}" method="POST"
                                    class="d-inline">
                                    @method('delete')
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

    @include('backend.kategori.create')

    @include('backend.kategori.edit')

@endsection
