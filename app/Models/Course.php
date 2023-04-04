<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['out_date'];

    public $timestamps = true;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getOutDate()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');
        return $this->publish_end < $date;
    }

    public function scopeWithWhereHas($query, $relation, $constraint){
     return $query->whereHas($relation, $constraint)
     ->with([$relation => $constraint]);
    }
}
