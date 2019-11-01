<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    public function children()
    {
        return $this->hasMany(self::class,'pid');
    }
}
