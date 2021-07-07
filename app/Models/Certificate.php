<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $table = 'certificates';
    protected $primaryKey = 'id';
    protected $fillable = [
       'id','type','photo','physican_id','created_at','updated_at'
    ];
    public $timestamps = true;
    public function phiscan()
    {
        return $this->belongsTo(Physican::class,'physican_id','id');
    }
    public function getTypeAttribute($value)
    {
        if($value==1){
            return ucfirst('bachelor');
        }elseif($value==2){
            return ucfirst('master');
        }elseif($value==3){
            return strtoupper('phd');
        }elseif($value==4){
            return ucfirst('fellowship');
        }
    }
}
