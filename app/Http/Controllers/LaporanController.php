<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Transaksi;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        $transaksi = Transaksi::all();

        return view('backend.laporan.index', compact('transaksi', 'kategori'));
    }

    public function filter(Request $request)
    {

        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_selesai;

        $transaksi = Transaksi::whereDate('tanggal', '>=', $tanggal_mulai)
            ->whereDate('tanggal', '<=', $tanggal_selesai)
            ->get();

        $totalPendapatan = 0;
        $totalPengeluaran = 0;

        foreach ($transaksi as $transaksiData) {
            if ($transaksiData->jenis == 'pendapatan') {
                $totalPendapatan += $transaksiData->nominal;
            } elseif ($transaksiData->jenis == 'pengeluaran') {
                $totalPengeluaran += $transaksiData->nominal;
            }
        }

        return view('backend.laporan.index', compact('transaksi', 'totalPendapatan', 'totalPengeluaran'));
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
