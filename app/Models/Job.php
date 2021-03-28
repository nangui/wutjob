<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_category_id',
        'title',
        'enterprise',
        'speciality',
        'description',
        'due_date',
        'completed'
    ];

    public function category()
    {
        return $this->belongsTo(JobCategory::class);
    }
}
