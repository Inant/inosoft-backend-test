<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MotorInterfaceService;
use App\Http\Requests\MotorRequest;

class MotorController extends Controller
{
    protected $motorService;

    public function __construct(MotorInterfaceService $motorService)
    {
        $this->motorService = $motorService;
    }

    // public function index(Request $request)
    // {
    //     $kendaraan = $this->motorService->getAll($request);
    //     return response()->json([
    //         'data' => $kendaraan,
    //         'message' => 'Success'
    //     ],200);
    // }

    public function store(MotorRequest $request)
    {
        try {
            $data = $request->validated();
            $motor = $this->motorService->add($data);
            return response()->json([
                'message' => 'Success',
                'data' => $motor
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
