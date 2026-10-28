<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=['student_number','student_name','student_phone','student_password','specialty_id','level_id',];
    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function specialty(){
        return $this->belongsTo(Specialty::class);
    }
//     public function answer()
//     {
//         return $this->hasMany(Answer::class,'student_id','id');

//    }
}
