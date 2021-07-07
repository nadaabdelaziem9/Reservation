<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $fillable = [
       'id','name','status','created_at','updated_at'
    ];
    public $timestamps = true;
    public function regions()
    {
        return $this->hasMany(Region::class,'city_id','id');
    }
    public function getStatusAttribute($value)
    {
        if($value==1){
            return ucfirst('active');
        };
        return ucfirst('not active');
    }
}
