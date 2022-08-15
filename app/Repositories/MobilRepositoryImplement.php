<?php

namespace App\Repositories;

use App\Models\Mobil;

class MobilRepositoryImplement implements MobilRepository
{
    public function getAll($data)
    {
        $mobil = Mobil::get();
        return $mobil;
    }

    public function store($data)
    {
        $mobil = new Mobil();
        $mobil = $mobil->create($data);
        return $mobil;
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
