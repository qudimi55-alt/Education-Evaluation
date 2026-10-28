<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable=['category_name'];
    use HasFactory;
    public function questions():HasMany
    {
        return $this->hasMany(Question::class,'category_id','id');
    }
    public function evaluations():BelongsToMany{
        return $this->belongsToMany(Evaluation_list::class, 'questions', 'category_id', 'evaluation_list_id');
    }
}
