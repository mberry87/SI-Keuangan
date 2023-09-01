<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaksi = Transaksi::all();

        $today = Carbon::now()->format('Y-m-d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $pendapatanHariIni = Transaksi::whereDate('tanggal', $today)
            ->where('jenis', 'pendapatan')
            ->sum('nominal');

        $pendapatanBulanIni = Transaksi::whereMonth('tanggal', $month)
            ->where('jenis', 'pendapatan')
            ->sum('nominal');

        $pendapatanTahunIni = Transaksi::whereYear('tanggal', $year)
            ->where('jenis', 'pendapatan')
            ->sum('nominal');

        return view('home', compact('pendapatanHariIni', 'pendapatanBulanIni', 'pendapatanTahunIni'));
    }
}
