<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = 'regions';
    protected $primaryKey = 'id';
    protected $fillable = [
       'id','name','status','city_id','created_at','updated_at'
    ];
    public $timestamps = true;
    public function addresses()
    {
        return $this->hasMany(Address::class,'region_id','id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function getStatusAttribute($value)
    {
        if($value==1){
            return ucfirst('active');
        };
        return ucfirst('not active');
    }
}
