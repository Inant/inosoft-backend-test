<?php

namespace App\Http\Controllers;

use App\Services\KendaraanInterfaceService;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    protected $kendaraanService;

    public function __construct(KendaraanInterfaceService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    public function index(Request $request)
    {
        $kendaraan = $this->kendaraanService->getAll($request);
        return response()->json([
            'data' => $kendaraan,
            'message' => 'Success'
        ],200);
    }

    public function store(Request $request)
    {
        $this->kendaraanService->add($request->all());
        return response()->json(['message' => 'Success'], 200);
    }

    public function getStok()
    {
        $dataStok = $this->kendaraanService->getStok();
        return response()->json(['message' => 'Success', 'data' => $dataStok], 200);
    }
}
