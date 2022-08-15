<?php

namespace App\Repositories;

use App\Models\Penjualan;

class PenjualanRepositoryImplement implements PenjualanRepository
{
    public function laporan($data)
    {
        $penjualan = Penjualan::with('kendaraan')
        ->whereBetween('tanggal', [$data['dari'], $data['sampai']])
        ->whereHas('kendaraan', function ($query) use($data) {
            return $query->where('tipe', $data['tipe']);
        })
        ->get();

        return $penjualan;
    }

    public function store($data)
    {
        $penjualan = new Penjualan();
        $penjualan = $penjualan->create($data);
        return $penjualan;
    }
}
