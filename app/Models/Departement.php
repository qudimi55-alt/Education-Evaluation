<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Departement extends Model
{
    use HasFactory;
    protected $fillable=['depart_name','college_id'];

    public function college(){
        return $this->belongsTo(College::class);
    }

    public function specialty():HasMany
    {
        return $this->hasMany(Specialty::class,'departement_id','id');
    }

    public function student():HasManyThrough{
        return $this->hasManyThrough(
            Student::class,
            Specialty::class,
            'departement_id', // Foreign key on the cars table...
            'specialty_id', // Foreign key on the owners table...
            'id', // Local key on the college table...
            'id',
             // Local key on the cars table...
        );
        // return $this->hasManyThrough(Specialty::class, Departement::class);
       }
       public function course():HasManyThrough{
        return $this->hasManyThrough(
            Course::class,
            Specialty::class,
            'departement_id', // Foreign key on the cars table...
            'specialty_id', // Foreign key on the owners table...
            'id', // Local key on the college table...
            'id',
             // Local key on the cars table...
        );
        // return $this->hasManyThrough(Specialty::class, Departement::class);
       }
       public function headDep(): HasOne
       {
           return $this->hasOne(Head::class,'departement_id','id');
       }

}
