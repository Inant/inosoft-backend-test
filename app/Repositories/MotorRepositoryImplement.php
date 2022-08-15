<?php

namespace App\Repositories;

use App\Models\Motor;

class MotorRepositoryImplement implements MotorRepository
{
    public function getAll($data)
    {
        $motor = Motor::get();
        return $motor;
    }

    public function store($data)
    {
        $motor = new Motor();
        $motor = $motor->create($data);
        return $motor;
    }

    public function show($id)
    {
        # code...
    }

    public function update($data, $id)
    {

    }

    public function delete($id)
    {

    }
}
