<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;
    protected $fillable=['course_name','specialty_id','level_id','teacher_id','year_teach'];
    public function level():BelongsTo{
        return $this->belongsTo(Level::class);
    }
    public function specialty():BelongsTo{
        return $this->belongsTo(Specialty::class);
    }
    public function teacher():BelongsTo{
        return $this->belongsTo(Teacher::class);
    }
    public function evaluations():BelongsToMany{
        return $this->belongsToMany(Evaluation_list::class, 'restrictions', 'course_id', 'evaluation_list_id');
    }
    // public function teachers():BelongsToMany{
    //     return $this->belongsToMany(Evaluation_list::class, 'restrictions', 'course_id', 'teacher_id');
    // }
    public function answer():HasMany
    {
        return $this->hasMany(Answer::class,'course_id','id');
    }
}
