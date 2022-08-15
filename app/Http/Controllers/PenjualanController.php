<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PenjualanInterfaceService;
use App\Services\KendaraanInterfaceService;
use App\Http\Requests\PenjualanRequest;
use Exception;

class PenjualanController extends Controller
{
    protected $penjualanService;
    protected $kendaraanService;

    public function __construct(PenjualanInterfaceService $penjualanService, KendaraanInterfaceService $kendaraanService)
    {
        $this->penjualanService = $penjualanService;
        $this->kendaraanService = $kendaraanService;
    }

    public function store(PenjualanRequest $request)
    {
        try {
            $data = $request->validated();
            $kendaraan = $this->kendaraanService->getById($data['id_kendaraan']);
            if ($kendaraan == null) {
                return response()->json([
                    'message' => 'Id kendaraan not found',
                ], 422);
            }
            $penjualan = $this->penjualanService->add($data);
            return response()->json([
                'message' => 'Success',
                'data' => $penjualan
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal server error.'
            ], 500);
        }
    }

    public function laporan(Request $request)
    {
        $dari = $request->get('dari');
        $sampai = $request->get('sampai');
        $tipe = $request->get('tipe');

        try {
            if ($dari == null || $sampai == null || $tipe == null) {
                return response()->json([
                    'message' => 'Incomplete query.'
                ], 422);
            }

            $data['dari'] = $dari;
            $data['sampai'] = $sampai;
            $data['tipe'] = $tipe;

            $penjualan = $this->penjualanService->laporan($data);

            return response()->json([
                'message' => 'Success',
                'data' => $penjualan
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal server error.'
            ], 500);
        }

    }
}
