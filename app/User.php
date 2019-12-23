<?php

namespace App;

use Egulias\EmailValidator\Validation\EmailValidation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Auth\Notifications\VerifyEmail;

//Añadir implements EmailValidation
//class User extends Authenticatable implements EmailValidation

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post()
    {
        return $this->hasMany('App\Post');
    }


    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    public function isAdmin()
    {
        return ($this->role == 'admin');
    }

    public function getRole(){

        return ($this->role);
    }
}
