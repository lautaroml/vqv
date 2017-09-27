<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function compatibilities()
    {
        return $this->hasMany('App\Compatibility')->where('negative', null);
    }

    public function incompatibilities()
    {
        return $this->hasMany('App\Compatibility')->where('negative', 1);
    }

    public function isCompatible($user)
    {
         $comp = $this->compatibilities->pluck('external_taller_id');
    }

}
