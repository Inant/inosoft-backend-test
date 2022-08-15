<?php

namespace App\Services;

use App\Repositories\PenjualanRepository;
use App\Services\KendaraanInterfaceService;

class PenjualanInterfaceServiceImplement implements PenjualanInterfaceService
{
    protected $penjualanRepository;
    protected $kendaraanService;

    public function __construct(PenjualanRepository $penjualanRepository, KendaraanInterfaceService $kendaraanService) {
        $this->penjualanRepository = $penjualanRepository;
        $this->kendaraanService = $kendaraanService;
    }

    public function add($data)
    {
        $penjualan['tanggal'] = $data['tanggal'];
        $penjualan['id_kendaraan'] = $data['id_kendaraan'];
        $penjualan['id_user'] = $data['id_user'];
        $penjualan['atas_nama'] = $data['atas_nama'];
        $penjualan['alamat'] = $data['alamat'];
        $penjualan['total'] = $data['total'];
        $penjualan['keterangan'] = $data['keterangan'];
        $penjualan['no_rangka'] = $data['no_rangka'];
        $penjualan['no_mesin'] = $data['no_mesin'];

        $penjualan = $this->penjualanRepository->store($penjualan);

        return $penjualan;
    }

    public function laporan($data)
    {
        $penjualan = $this->penjualanRepository->laporan($data);

        return $penjualan;
    }
}
