<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restriction extends Model
{
    use HasFactory;
    protected $fillable=['evaluation_list_id','course_id'];
    public function evaluation(){
        return $this->belongsTo(Evaluation_list::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function answer()
    {
        return $this->hasMany(Answer::class,'restriction_id','id');

   }
}
