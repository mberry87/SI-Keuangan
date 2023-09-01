@extends('layouts.admin')

@section('title', 'home')

@section('breadcrumb')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
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
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5>Rp. {{ formatRupiah($pendapatanHariIni) }}</h5>
                            <p>PENDAPATAN HARI INI</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3
                        col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5>Rp. {{ formatRupiah($pendapatanBulanIni) }}</h5>
                            <p>PENDAPATAN BULAN INI</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h5>Rp. {{ formatRupiah($pendapatanTahunIni) }}</h5>
                            <p>PENDAPATAN TAHUN INI</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h5>20</h5>
                            <p>SELURUH PENDAPATAN</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-card"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
