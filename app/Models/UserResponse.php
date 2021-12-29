<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    use HasFactory;
    public $table='user_response';
    
    public $fillable=[
        'user_exam_id','question_id','answer'
    ];

    public function exam(){
        return $this->belongsTo(UserExam::class);
    }

    
}
