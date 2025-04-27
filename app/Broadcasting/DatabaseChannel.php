<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Notifications\Notification;

use Illuminate\Notifications\Channels\DatabaseChannel as DBO;

class DatabaseChannel extends DBO
{

    protected function buildPayload($notifiable, Notification $notification)
    {
        dd($notification);
        return [
          'id'=>$notifiable->id,
          'type'=>get_class($notification),
          'data'=>serialize($notification),
          'read_at' => null,
          'serialized' => true
        ];
    }

}
