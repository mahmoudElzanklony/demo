<?php

namespace App\contracts;


interface AppointmentInterface
{
    public function index();

    //public function show($id);

    public function create(array $data);

    public function update($data , $id);

    public function get_info();
}
