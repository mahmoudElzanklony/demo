<?php

namespace App\Http\Patterns\Strategy\Appointment;

use App\contracts\HospitalRoomInterface;

class LowOperation implements HospitalRoomInterface
{

    public function define_doctors()
    {
        return 2;
    }

    public function define_nurses()
    {
        return 4;
    }

    public function detect_cost()
    {
        return 1000;
    }

}
