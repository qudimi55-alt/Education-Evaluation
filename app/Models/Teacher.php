<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable=['teacher_name','teacher_number','teacher_phone','teacher_password'];

    public function course():HasMany
    {
        return $this->hasMany(Course::class,'teacher_id','id');

   }
//    public function courses():BelongsToMany{
//     return $this->belongsToMany(Evaluation_list::class, 'restrictions', 'teacher_id', 'course_id');
// }
}
