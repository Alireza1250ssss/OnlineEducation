<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $fillable=[
        'title',
        'teacher_id',
        'capacity',
        'filled',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function teacher(){
        return $this->hasOne(User::class,'id','teacher_id');
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }
}
