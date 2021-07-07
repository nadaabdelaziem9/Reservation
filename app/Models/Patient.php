<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Patient extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'patients';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','gender','email','password','phone','code','status','remember_token','email_verified_at','birthdate','created_at','updated_at'
    ];
    
    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function appointments()
    {
        return $this->hasMany(Appointment::class,'patient_id','id');
    }
    public function physicans()
    {
        return $this->belongsToMany(Physican::class,'reviews','patient_id','physican_id','id','id')->as('reviews');
    }
    public function getStatusAttribute($value)
    {
        if($value==1){
            return ucfirst('verified');
        }elseif($value==2){
            return ucfirst('banned');
        }
        return ucfirst('not verified');
    }
}