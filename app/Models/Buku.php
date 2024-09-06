<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = [
        'nama',
        'kategori_id',
        'author',
        'tanggal_rilis',
        'publisher',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
