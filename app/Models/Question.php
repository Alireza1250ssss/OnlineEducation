<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $fillable=[
        'course_id','type','title','content','answer','score'
    ];

    protected $casts=[
        'content'=>'array',
        'answer'=>'array'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function exams(){
        return $this->belongsToMany(Exam::class);
    }

    
}
