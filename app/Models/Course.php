<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

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

    public function scopeWithWhereHas($query, $relation, $constraint){
     return $query->whereHas($relation, $constraint)
     ->with([$relation => $constraint]);
    }
}
