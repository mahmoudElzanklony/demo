<?php

namespace App\Http\Patterns\Factory;

use App\Http\Patterns\Strategy\Appointment\HighOperation;
use App\Http\Patterns\Strategy\Appointment\LowOperation;
use App\Http\Patterns\Strategy\Appointment\MiddleOperation;
use App\Services\Messages;

class DetectRightOperationRoomFactory
{
    public static function get($type)
    {
        if($type == 'operation'){
            return new HighOperation();
        }else if($type == 'revelation'){
            return new MiddleOperation();
        }else if($type == 'visit'){
            return new LowOperation();
        }else{
            abort(Messages::error('Room type is not right'));
        }
    }
}
