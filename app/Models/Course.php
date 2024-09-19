<?php

namespace App\Models;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'content'];
    protected $fillable = ['name', 'content', 'image', 'slug', 'status','courseable'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->slug = $course->slug ?? Str::slug($course->name);
        });
    }

    public function courseable()
    {
        return $this->morphTo();
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
