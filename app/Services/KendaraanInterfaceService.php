<?php

namespace App\Services;

interface KendaraanInterfaceService
{
    public function getAll($data);
    public function getById($id);
    public function add($data);
    public function getStok();
}
