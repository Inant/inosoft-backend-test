<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MobilRequest;

use App\Services\MobilInterfaceService;
use Exception;

class MobilController extends Controller
{
    protected $mobilService;

    public function __construct(MobilInterfaceService $mobilService)
    {
        $this->mobilService = $mobilService;
    }

    // public function index(Request $request)
    // {
    //     $kendaraan = $this->mobilService->getAll($request);
    //     return response()->json([
    //         'data' => $kendaraan,
    //         'message' => 'Success'
    //     ],200);
    // }

    public function store(MobilRequest $request)
    {
        try {
            $data = $request->validated();
            $mobil = $this->mobilService->add($data);
            return response()->json([
                'message' => 'Success',
                'data' => $mobil
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error' . $e->getMessage(),
            ], 200);
        }
    }
}
