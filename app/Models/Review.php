<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Review extends Pivot
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $fillable = [
       'comment','value','physican_id','patient_id','created_at','updated_at'
    ];
    public $timestamps = true;
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
    public function physican()
    {
        return $this->belongsTo(Physican::class,'physican_id','id');
    }
}
