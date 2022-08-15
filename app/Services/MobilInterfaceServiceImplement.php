<?php

namespace App\Services;

use App\Repositories\MobilRepository;
use App\Services\KendaraanInterfaceService;

class MobilInterfaceServiceImplement implements MobilInterfaceService
{
    protected $mobilRepository;
    protected $kendaraanService;

    public function __construct(MobilRepository $mobilRepository, KendaraanInterfaceService $kendaraanService) {
        $this->mobilRepository = $mobilRepository;
        $this->kendaraanService = $kendaraanService;
    }

    public function add($data)
    {
        $kendaraan['tahun_keluaran'] = $data['tahun_keluaran'];
        $kendaraan['warna'] = $data['warna'];
        $kendaraan['harga'] = $data['harga'];
        $kendaraan['tipe'] = 'mobil';
        $newKendaraan = $this->kendaraanService->add($kendaraan);

        $mobil['mesin'] = $data['mesin'];
        $mobil['kapasitas_penumpang'] = $data['kapasitas_penumpang'];
        $mobil['tipe'] = $data['tipe'];
        $mobil['id_kendaraan'] = $newKendaraan;
        $mobil['stok'] = $data['stok'];

        $mobil = $this->mobilRepository->store($mobil);

        return $mobil;
    }
}
