<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $primaryKey = 'No';

    public $timestamps = false;

    protected $fillable = [
        'Tipe _Kamar',
        'Ukuran_Kamar',
        'Harga_sewa',
        'Fasilitas',
    ];
}
