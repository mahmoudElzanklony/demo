<?php

namespace App\Http\Patterns\Strategy\Appointment;

use App\contracts\HospitalRoomInterface;

class MiddleOperation  implements HospitalRoomInterface
{

    public function define_doctors()
    {
        return 4;
    }

    public function define_nurses()
    {
        return 6;
    }


    public function detect_cost()
    {
        return 5000;
    }
}
