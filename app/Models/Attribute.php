<?php

namespace App\Models;

use App\Models\JobAttributeValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'options'];

    protected $casts = [
        'options' => 'array', // Automatically cast JSON options to an array
    ];

    public function jobAttributeValues()
    {
        return $this->hasMany(JobAttributeValue::class);
    }
}
