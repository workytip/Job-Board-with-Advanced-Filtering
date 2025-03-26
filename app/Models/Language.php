<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
