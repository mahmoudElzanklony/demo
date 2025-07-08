<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment_details extends Model
{
    use HasFactory;

    protected $fillable = ['appointment_id','doctors_no','nurseries_no'];
}
