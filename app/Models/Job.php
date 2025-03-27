<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Language;
use App\Models\Location;
use App\Models\JobAttributeValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'company_name',
        'salary_min',
        'salary_max',
        'is_remote',
        'job_type',
        'published_at',
        'status', 
    ];

    protected $casts = [
        'is_remote' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function attributes()
    {
        return $this->hasMany(JobAttributeValue::class);
    }
}
