<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobAttributeValue extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'attribute_id', 'value'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
