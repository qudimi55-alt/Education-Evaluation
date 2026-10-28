<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable=['restriction_id','student_id','course_id','evaluation_list_id','question_id','head_id','answer'];
    protected $casts = [
        'answer' => 'integer',
    ];
    public function restrition(){
        return $this->belongsTo(Restriction::class);
    }
    // public function student(){
    //     return $this->belongsTo(Student::class);
    // }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function evaluation(){
        return $this->belongsTo(Evaluation_list::class);
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
