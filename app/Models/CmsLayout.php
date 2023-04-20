<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsLayout extends Model
{
    use HasFactory;

    protected $table = 'cms_layout';
    public $timestamps = false;
}
