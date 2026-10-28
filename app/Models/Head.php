<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Head extends Model
{
    use HasFactory;
    protected $fillable=['name_head','number_head','phone_head','password','departement_id'];
    public function departement():BelongsTo
    {
        return $this->belongsTo(Departement::class);
    }

}
