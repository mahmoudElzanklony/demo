<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment_payment extends Model
{
    use HasFactory;

    protected $fillable = ['appointment_id','money','type','discount','tax'];
}
