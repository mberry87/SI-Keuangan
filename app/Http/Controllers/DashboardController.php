<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

        return view('backend.dashboard.index', compact('pendapatanHariIni', 'pendapatanBulanIni', 'pendapatanTahunIni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
