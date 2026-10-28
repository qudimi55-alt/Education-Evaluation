<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialty extends Model
{
    use HasFactory;
    protected $fillable=['specialty_name','departement_id',];
    public function departement():BelongsTo
    {
        return $this->belongsTo(Departement::class,);
    }
    public function student()
    {
        return $this->hasMany(Student::class,'specialty_id','id');

    }
   public function course()
   {
       return $this->hasMany(Course::class,'specialty_id','id');

  }
}
