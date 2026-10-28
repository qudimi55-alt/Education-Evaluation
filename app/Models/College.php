<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class College extends Model
{
    use HasFactory;

    public function departement()
    {
        return $this->hasMany(Departement::class,'college_id','id');

   }
//    public function admin():HasMany
//    {
//        return $this->hasMany(Admin::class,'college_id','id');

//   }

   public function depar():HasManyThrough{
    return $this->hasManyThrough(
        Specialty::class,
        Departement::class,
        'college_id', // Foreign key on the cars table...
        'departement_id', // Foreign key on the owners table...
        'id', // Local key on the college table...
        'id',
         // Local key on the cars table...
    );
    // return $this->hasManyThrough(Specialty::class, Departement::class);
   }

   // String based syntax...
// return $this->through('environments')->has('deployments');

// Dynamic syntax...
// return $this->throughEnvironments()->hasDeployments();
}
