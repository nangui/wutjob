<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'enterprise',
        'speciality',
        'description',
        'due_date',
        'completed',
        'salary',
        'work_type',
        'location',
    ];

    protected $dates = [
        'due_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getWorkTypeAttribute($value)
    {
        $type = '';
        if ($value === 'full_time') {
            $type = 'A temps plein';
        } else if ($value === 'part_time') {
            $type = 'A temps partiel';
        } else {
            $type = 'Stage';
        }
        return $type;
    }

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }
}
