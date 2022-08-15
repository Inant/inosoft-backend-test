<?php

namespace App\Repositories;

interface KendaraanRepository{
    public function getAll($data);
    public function getById($id);
    public function store($data);
    public function getStok();
}
