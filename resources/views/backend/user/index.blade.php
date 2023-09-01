@extends('layouts.admin')

@section('title', 'User')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="m-0">User</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Tabel Data</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-3" data-toggle="modal"
                        data-target="#modal-createUser"><i class="fa fa-plus"></i> Tambah</a>
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $userData)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $userData->name }}</td>
                                        <td>{{ $userData->username }}</td>
                                        <td>{{ $userData->email }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $userData->id) }}" class="btn btn-info btn-sm"
                                                data-toggle="modal" data-dismiss="modal"
                                                data-target="#modal-editUser{{ $userData->id }}"><i class="fa fa-pen"></i>
                                                Edit</a>
                                            <form action="{{ route('user.destroy', $userData->id) }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" id="btn-hapus">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')

    @include('backend.user.create')

    @include('backend.user.edit')

@endsection
