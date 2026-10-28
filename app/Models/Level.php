<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable=['level_name'];
    public function student()
    {
        return $this->hasMany(Student::class,'level_id','id');

   }
   public function course()
   {
       return $this->hasMany(Course::class,'level_id','id');

  }
}
