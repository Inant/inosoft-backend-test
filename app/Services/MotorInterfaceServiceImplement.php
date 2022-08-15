<?php

namespace App\Services;

use App\Repositories\MotorRepository;
use App\Services\KendaraanInterfaceService;

class MotorInterfaceServiceImplement implements MotorInterfaceService
{
    protected $motorRepository;
    protected $kendaraanService;

    public function __construct(MotorRepository $motorRepository, KendaraanInterfaceService $kendaraanService) {
        $this->motorRepository = $motorRepository;
        $this->kendaraanService = $kendaraanService;
    }

    public function add($data)
    {
        $kendaraan['tahun_keluaran'] = $data['tahun_keluaran'];
        $kendaraan['warna'] = $data['warna'];
        $kendaraan['harga'] = $data['harga'];
        $kendaraan['tipe'] = 'motor';
        $newKendaraan = $this->kendaraanService->add($kendaraan);

        $motor['tipe_suspensi'] = $data['tipe_suspensi'];
        $motor['tipe_transmisi'] = $data['tipe_transmisi'];
        $motor['id_kendaraan'] = $newKendaraan;
        $motor['stok'] = $data['stok'];

        $motor = $this->motorRepository->store($motor);

        return $motor;
    }
}
