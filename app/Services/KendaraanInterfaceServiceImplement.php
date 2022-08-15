<?php

namespace App\Services;

use App\Repositories\KendaraanRepository;

class KendaraanInterfaceServiceImplement implements KendaraanInterfaceService
{
    protected $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepository) {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function getAll($data)
    {
        $kendaraan = $this->kendaraanRepository->store($data);
        return $kendaraan;
    }

    public function add($data)
    {
        $kendaraan = $this->kendaraanRepository->store($data);
        return $kendaraan;
    }

    public function getStok()
    {
        $kendaraan = $this->kendaraanRepository->getStok();
        return $kendaraan;
    }
}
