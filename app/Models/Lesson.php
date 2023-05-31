<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    const STATUS_RENDER_NEW = 0;
    const STATUS_RENDER_SUCCESS = 1;
    const STATUS_RENDER_PENDING = 2;
    const STATUS_RENDER_FAIL = 3;

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function histories()
    {
        return $this->hasMany(HistoryView::class);
    }

    public function scopeWithWhereHas($query, $relation, $constraint){
     return $query->whereHas($relation, $constraint)
     ->with([$relation => $constraint]);
    }
}
