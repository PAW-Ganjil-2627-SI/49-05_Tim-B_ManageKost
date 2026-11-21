<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Housekeeper extends Model
{
    protected $fillable = ['nama', 'no_hp', 'area_penanganan', 'tugas_harian'];
}