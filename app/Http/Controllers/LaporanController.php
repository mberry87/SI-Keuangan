<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Laporan;
use App\Models\Transaksi;
use PDF;


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
        $departemen = Departemen::all();
        $transaksi = Transaksi::all();

        $hasilLaporan = false;

        return view('backend.laporan.index', compact('departemen', 'transaksi', 'hasilLaporan'));
    }

    public function create(Request $request)

    {
        //
    }

    public function filter(Request $request)
    {

        $validateData = $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'departemen' => 'nullable',
        ]);


        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        $departemenId = $request->input('departemen');

        $transaksi = Transaksi::whereDate('tanggal', '>=', $tanggalMulai)
            ->whereDate('tanggal', '<=', $tanggalSelesai)
            ->where('departemen_id', $departemenId)
            ->get();

        $departemen = Departemen::all();

        $hasilLaporan = true;

        return view('backend.laporan.index', compact('transaksi', 'departemen', 'hasilLaporan'));
    }

    public function cetakPDF(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        // $departemenId = $request->input('departemen');

        // $transaksi = Transaksi::whereDate('tanggal', '>=', $tanggalMulai)
        //     ->whereDate('tanggal', '<=', $tanggalSelesai)
        //     ->where('departemen_id', $departemenId)
        //     ->get();

        $transaksi =  Transaksi::all();
        $departemen = Departemen::all();

        $pdf = PDF::loadView('backend.laporan.form_pdf', compact('transaksi', 'departemen', 'tanggalMulai', 'tanggalSelesai'));

        return $pdf->download('laporan.pdf');
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
