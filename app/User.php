<?php

namespace App;

use App\Model\Menu;
use App\Model\Permission;
use App\Model\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

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

    public function role()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function getMenus()
    {
        if ($this->isSuperUser()) {
            return Menu::with(['children' => function ($query) {
                return $query->where('status', Menu::STATUS_ON);
            }])->where(['level' => 1, 'status' => Menu::STATUS_ON])->get();
        } else {
            return $this->role->map(function ($role) {
                return $role->menu()->with(['children' => function ($query) {
                    return $query->where('status', Menu::STATUS_ON);
                }])->where(['level' => 1, 'status' => Menu::STATUS_ON])->get();
            })->collapse()->unique('id');
        }
    }

    public function getPermissions()
    {
        return $this->role->map(function ($role) {
            return $role->permission;
        })->collapse()->map(function ($permission) {
            return $permission->routes;
        })->collapse();
    }

    public function isSuperUser()
    {
        return $this->name == 'admin' ? true : false;
    }
}
