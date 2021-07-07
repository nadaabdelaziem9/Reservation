<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $primaryKey = 'id';
    protected $fillable = [
       'id','name','status','created_at','updated_at'
    ];
    public $timestamps = true;
    public function physicans()
    {
        return $this->hasMany(Physican::class,'department_id','id');
    }
    public function services()
    {
        return $this->hasMany(Service::class,'department_id','id');
    }
    public function getStatusAttribute($value)
    {
        if($value==1){
            return ucfirst('active');
        };
        return ucfirst('not active');
    }
}
