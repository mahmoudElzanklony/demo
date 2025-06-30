<?php

namespace App\Traits;

trait SaveUserIdAtModelTrait
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->user_id = auth()->id();
        });
    }
}
