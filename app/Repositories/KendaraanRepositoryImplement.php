<?php

namespace App\Repositories;

use App\Models\Kendaraan;

class KendaraanRepositoryImplement implements KendaraanRepository
{
    public function getAll($data)
    {
        $kendaraan = Kendaraan::get();
        return $kendaraan;
    }

    public function getById($id)
    {
        $kendaraan = Kendaraan::where('_id', $id)->first();
        return $kendaraan;
    }

    public function store($data)
    {
        $kendaraan = new Kendaraan();
        $kendaraan = $kendaraan->create($data);
        return $kendaraan->_id;
    }

    public function getStok()
    {
        $kendaraan = Kendaraan::with('motor', 'mobil')
        ->get()
        ->map(function($kendaraan) {
            return [
                '_id' => $kendaraan->_id,
                'tahun_keluaran' => $kendaraan->tahun_keluaran,
                'warna' => $kendaraan->warna,
                'harga' => $kendaraan->harga,
                'tipe' => $kendaraan->tipe,
                'stok' => $kendaraan->tipe == 'mobil' ? $kendaraan->mobil->stok : $kendaraan->motor->stok
            ];
        });
        return $kendaraan;
    }
}
