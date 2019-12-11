<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Role::class,1)->make()->each(function($r){
            $r->permission()->save(factory(\App\Model\Permission::class)->make());
        });
    }
}
