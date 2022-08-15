<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Kendaraan;
use App\Models\User;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Penjualan extends Eloquent
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $guarded = [];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
