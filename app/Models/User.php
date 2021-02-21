<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that  are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'email',
        'password',
        'type_id',
        'balance',
        'stateBlock',
        'image',
        'remember_token',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function posts(){
        return $this->hasMany('App\Models\Post' , 'owner_id' , 'id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment' , 'owner_id' , 'id');
    }


    public function staff(){
        return $this->hasOne('App\Models\staff' , 'user_id' , 'id');
    }

    public function language(){
        return $this->hasOne('App\Models\SessionLanguage' , 'user_id' , 'id');
    }


    public function rooms(){
        return $this->belongsToMany('App\Models\room' , 'userrooms' , 'user_id' , 'room_id' , 'id' ,'id');
    }
}
