<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class categories extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','description'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->user_id = auth()->id();
        });
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id')->withTrashed();
    }

}
