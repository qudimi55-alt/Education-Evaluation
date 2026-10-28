<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable=['question_text','question_for','evaluation_list_id','category_id'];
    public function evaluation(){
        return $this->belongsTo(Evaluation_list::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function answer():HasMany
    {
        return $this->hasMany(Answer::class,'question_id','id');
    }
}
