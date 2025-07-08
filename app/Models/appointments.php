<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SaveUserIdAtModelTrait;

class appointments extends Model
{
    use HasFactory , SaveUserIdAtModelTrait;



    protected $fillable = ['user_id','room_type','info','transfer_type','date'];
}
