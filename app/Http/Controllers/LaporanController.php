<?php

namespace App\Http\Controllers;


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
        //
    }

    public function create(Request $request)

    {
        $transaksi = Transaksi::all();
        $hasilLaporan = false;

        return view('backend.laporan.create', compact('transaksi', 'hasilLaporan'));
    }

    public function filter(Request $request)
    {

        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_selesai = $request->input('tanggal_selesai');

        $transaksi = Transaksi::whereDate('tanggal', '>=', $tanggal_mulai)
            ->whereDate('tanggal', '<=', $tanggal_selesai)
            ->get();

        $hasilLaporan = true;

        return view('backend.laporan.create', compact('transaksi', 'hasilLaporan', 'tanggal_mulai', 'tanggal_selesai'));
    }

    public function cetakPDF(Request $request)
    {
        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_selesai = $request->input('tanggal_selesai');

        $transaksi = Transaksi::whereDate('tanggal', '>=', $tanggal_mulai)
            ->whereDate('tanggal', '<=', $tanggal_selesai)
            ->get();

        $pdf = PDF::loadView('backend.laporan.form_pdf', compact('transaksi', 'tanggal_mulai', 'tanggal_selesai'));

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
