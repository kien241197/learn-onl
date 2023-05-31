<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Database\Eloquent\Model;

class CmsLayout extends Model
{
    use HasFactory;

    protected $table = 'cms_layout';
    public $timestamps = false;

    /**
     * @var CmsLayout $self
     */
    private static $self;
    public static function getInstance()
    {
        if (!static::$self) {
            static::$self = new static();
        }
        return static::$self;
    }

    /**
     * @return HigherOrderBuilderProxy|mixed|null
     */
    public function getPhoneNumberWatermark()
    {
        $query = $this->newQuery()
            ->select(['default_phoneNumber_watermark'])
            ->first();
        return $query->default_phoneNumber_watermark ?? null;
    }
}
