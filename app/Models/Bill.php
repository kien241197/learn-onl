<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bill extends Model
{
    use HasFactory;

    public $timestamps = true;


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
