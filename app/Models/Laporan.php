<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{

    protected $table = 'laporan';

    protected $fillable = [
        'tanggal',
        'jenis',
        'kategori_id',
        'transaksi_id',
        'nominal',
        'keterangan',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
