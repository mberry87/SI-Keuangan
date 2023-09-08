<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $table = 'departemen';

    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'telepon'
    ];

    /**
     * Get all of the comments for the Departemen
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Departemen()
    {
        return $this->hasMany(Depertemen::class);
    }
}
