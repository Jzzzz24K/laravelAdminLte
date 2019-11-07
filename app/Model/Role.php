<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }
}
