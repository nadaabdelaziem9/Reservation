<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    protected $fillable = [
       'id','title','place','start_date','end_date','status','physican_id','created_at','updated_at'
    ];
    public $timestamps = true;
    public function physican()
    {
        return $this->belongsTo(Physican::class,'physican_id','id');
    }
    public function getStatusAttribute($value)
    {
        if($value==1){
            return ucfirst('left job');
        };
        return ucfirst('current job');
    }
}
