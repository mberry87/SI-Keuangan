@extends('layout.admin')
@section('title', 'dashboard')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Blank Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item active">Bl</li> --}}
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>20</h3>
                    <p>PEMASUKAN HARI INI</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>20</h3>
                    <p>PEMASUKAN BULAN INI</p>
                </div>
                <div class="icon">
                    <i class="ion ion-card"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>20</h3>
                    <p>PEMASUKAN TAHUN INI</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-boat"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>20</h3>
                    <p>SELURUH PEMASUKAN</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-boat"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
