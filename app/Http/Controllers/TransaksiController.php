<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
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


        return view('backend.transaksi.index', compact('transaksi', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $transaksi = new Transaksi;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->jenis = $request->jenis;
        $transaksi->kategori_id = $request->kategori_id;
        $transaksi->nominal = str_replace('.', '', $request->nominal);
        $transaksi->keterangan = $request->keterangan;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambah');
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
        $transaksi = Transaksi::findOrFail($id);

        return view('backend.transaksi.edit', compact('transaksi'));
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

        $validatedData = $request->validate([
            'tanggal' => 'required',
            'jenis' => 'required',
            'kategori_id' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);

        $transaksi = Transaksi::find($id);

        $transaksi->tanggal = $validatedData['tanggal'];
        $transaksi->jenis = $validatedData['jenis'];
        $transaksi->kategori_id = $validatedData['kategori_id'];
        $transaksi->nominal = str_replace('.', '', $validatedData['nominal']);
        $transaksi->keterangan = $validatedData['keterangan'];

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbaruhi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil di hapus');
    }
}
