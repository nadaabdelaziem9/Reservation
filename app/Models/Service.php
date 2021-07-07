<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable = [
       'id','name','status','department_id','created_at','updated_at'
    ];
    public $timestamps = true;
    public function department()
    {
        return $this->belongsTo(Department::class, 'depatment_id','id');
    }
    public function getStatusAttribute($value)
    {
        if($value==1){
            return ucfirst('active');
        };
        return ucfirst('not active');
    }
}
