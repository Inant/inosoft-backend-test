<?php

namespace App\Repositories;

interface MotorRepository{
    public function getAll($data);
    public function store($data);
    public function show($id);
    public function update($data, $id);
    public function delete($id);
}
