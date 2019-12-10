<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    const STATUS_ON = 1;
    const STATUS_OFF = 1;


    //
    public function children()
    {
        return $this->hasMany(self::class,'pid');
    }

    public function role()
    {
        return $this->belongsToMany(Role::class,'menu_role');
    }
}
