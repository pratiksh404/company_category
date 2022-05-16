<?php

namespace App\Models\Admin;

use App\Models\Admin\Category;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Company extends Model
{
    use LogsActivity;

    protected $guarded = [];

    // Forget cache on updating or saving and deleting
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            self::cacheKey();
        });

        static::deleting(function () {
            self::cacheKey();
        });
    }

    // Cache Keys
    private static function cacheKey()
    {
        Cache::has('companies') ? Cache::forget('companies') : '';
    }

    // Logs
    protected static $logName = 'company';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected $appends = ["network_image"];

    // Accessors
    public function getImageAttribute($attribute)
    {
        if (isset($attribute)) {
            if (file_exists(public_path('storage/' . $attribute))) {
                return asset('storage/' . $attribute);
            } elseif (file_exists(public_path($attribute))) {
                return asset($attribute);
            } else {
                return asset('adminetic/static/placeholder.png');
            }
        } else {
            return asset('adminetic/static/placeholder.png');
        }
    }
    public function getStatusAttribute($attribute)
    {
        return  [
            0 => 'Inactive',
            1 => 'Active',
        ][boolval($attribute)];
    }
    public function getNetworkImageAttribute()
    {
        return isset($this->image) ? url($this->image) : null;
    }

    // Relaitonships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
