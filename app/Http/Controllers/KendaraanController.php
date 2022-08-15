<?php

namespace App\Http\Controllers;

use App\Services\KendaraanInterfaceService;
use Exception;
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
        try {
            $kendaraan = $this->kendaraanService->getAll($request);
            return response()->json([
                'data' => $kendaraan,
                'message' => 'Success'
            ],200);
        }
        catch (Exception $e) {
            return response()->json([
                'message' => 'Internal server error.'
            ],500);
        }
    }

    public function show($id)
    {
        try {
            $kendaraan = $this->kendaraanService->getById($id);
            return response()->json([
                'data' => $kendaraan,
                'message' => 'Success'
            ],200);
        }
        catch (Exception $e) {
            return response()->json([
                'message' => 'Internal server error.'
            ],500);
        }
    }

    public function getStok()
    {
        $dataStok = $this->kendaraanService->getStok();
        return response()->json(['message' => 'Success', 'data' => $dataStok], 200);
    }
}
