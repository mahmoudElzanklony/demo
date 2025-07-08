<?php

namespace App\Http\Patterns\Strategy\Appointment;

use App\contracts\HospitalRoomInterface;

class HighOperation  implements HospitalRoomInterface
{

    public function define_doctors()
    {
        return 8;
    }

    public function define_nurses()
    {
        return 10;
    }


    public function detect_cost()
    {
        return 50000;
    }
}

