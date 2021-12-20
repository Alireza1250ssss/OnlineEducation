<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable=[
        'course_id',
        'title',
        'details',
        'duration',
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function questions(){
        return $this->belongsToMany(Question::class)->withPivot('temp_score');
    }
}
