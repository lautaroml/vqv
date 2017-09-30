<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'document',
        'age',
        'birthday',
        'country_id',
        'state_id',
        'email',
        'password',
        'elenco',
        'other_state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tallers()
    {
        return $this->belongsToMany('App\Taller');
    }

    public function has($id)
    {
        return $this->tallers()->find($id);
    }

    /*public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }*/
}
