<?php

namespace App\Http\Patterns\Builders;

use App\Http\Patterns\Factory\DetectRightOperationRoomFactory;
use App\Models\appointment_details;
use App\Models\appointment_payment;
use App\Models\appointments;
use Illuminate\Support\Facades\DB;

class AppointmentBuilder
{
    private $data;
    private $room = null;
    public $appointment = null;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function make_basic_appointment()
    {
        DB::beginTransaction();
        $this->appointment = appointments::query()->create([
            'room_type'=>$this->data['room_type'],
            'info'=>$this->data['info'],
            'transfer_type'=>$this->data['transfer_type'],
            'date'=>$this->data['date']
        ]);
        return $this;
    }

    public function detect_room()
    {
        $this->room = DetectRightOperationRoomFactory::get($this->data['room_type']);
        return $this;
    }

    public function save_details()
    {
        appointment_details::query()->create([
           'appointment_id'=>$this->appointment->id,
           'doctors_no'=>$this->room->define_doctors(),
           'nurseries_no'=>$this->room->define_nurses()
        ]);
        return $this;
    }

    public function save_payment()
    {
        appointment_payment::query()->create([
           'appointment_id'=>$this->appointment->id,
           'type'=>$this->data['payment_type'],
           'money'=>$this->room->detect_cost(),
           'tax'=>2.5,
           'discount'=>0
        ]);
        DB::commit();
    }



}
