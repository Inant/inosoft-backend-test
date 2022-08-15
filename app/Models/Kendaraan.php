<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Motor;
use App\Models\Mobil;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kendaraan extends Eloquent
{
    use HasFactory;

    protected $table = 'kendaraan';

    protected $guarded = [];

    public function motor()
    {
        return $this->hasOne(Motor::class, 'id_kendaraan');
    }

    public function mobil()
    {
        return $this->hasOne(Mobil::class, 'id_kendaraan');
    }
}
