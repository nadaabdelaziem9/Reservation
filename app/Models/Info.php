<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $table = 'infos';
    protected $primaryKey = 'id';
    protected $fillable = [
       'id','title','license','photo','about','birthdate','created_at','updated_at'
    ];
    public $timestamps = true;
    public function physican()
    {
        return $this->belongsTo(Physican::class,'info_id','id');
    }
    public function getTitleAttribute($value)
    {
        if($value==1){
            return ucfirst('professor');
        }elseif($value==2){
            return ucfirst('lecturer');
        }elseif($value==3){
            return strtoupper('consultant');
        }elseif($value==4){
            return ucfirst('specialist');
        }elseif($value==5){
            return ucfirst('assistant lecturer');
        }
        elseif($value==6){
            return ucfirst('assistant proffesor');
        }
    }
}
