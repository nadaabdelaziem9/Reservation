<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workday extends Model
{
    use HasFactory;
    protected $table = 'workdays';
    protected $primaryKey = 'id';
    protected $fillable = [
       'id','available','clinic_id','created_at','updated_at'
    ];
    public $timestamps = true;
    public function clinic()
    {
        return $this->belongsTo(Clinic::class,'clinic_id','id');
    }
}
