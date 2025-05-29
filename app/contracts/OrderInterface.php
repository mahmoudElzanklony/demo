<?php

namespace App\contracts;

interface OrderInterface
{
    public function index();

    //public function show($id);

    public function create(array $data);

    public function update($data , $id);
}
