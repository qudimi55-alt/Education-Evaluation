<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Evaluation_list extends Model
{
    use HasFactory;
    protected $fillable=['evaluation_year','semester_name','default'];

    public function courses():BelongsToMany{
        return $this->belongsToMany(Course::class, 'restrictions', 'evaluation_list_id', 'course_id');
    }
    public function questions():HasMany
    {
        return $this->hasMany(Question::class,'evaluation_list_id','id');
    }
    public function categorys():BelongsToMany{
        return $this->belongsToMany(Category::class, 'questions', 'evaluation_list_id', 'category_id');
    }
    public function answer():HasMany
    {
        return $this->hasMany(Answer::class,'evaluation_list_id','id');
    }
}

