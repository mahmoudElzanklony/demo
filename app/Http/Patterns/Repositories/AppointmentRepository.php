<?php

namespace App\Http\Patterns\Repositories;

use App\contracts\AppointmentInterface;
use App\Http\Patterns\Builders\AppointmentBuilder;
use App\Models\appointments;

class AppointmentRepository implements AppointmentInterface
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function create(array $data)
    {
        $builder = new AppointmentBuilder($data);
        $builder->make_basic_appointment()->detect_room()->save_details()->save_payment();
        return $builder->appointment;
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function get_info()
    {
        dump('logic of get info');
    }

}
