<?php

namespace App\contracts;

interface HospitalRoomInterface
{
    public function define_doctors();
    public function define_nurses();

    public function detect_cost();

}
