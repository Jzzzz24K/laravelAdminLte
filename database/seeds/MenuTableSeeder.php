<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            ['name' => '系统管理', 'icon' => 'fa-gear', 'pid' => 0, 'level' => 1, 'url' => '#'],
            ['name' => '管理员管理', 'icon' => 'fa-user', 'pid' => 1, 'level' => 2, 'url' => '/adminuser'],
            ['name' => '角色管理', 'icon' => 'fa-group', 'pid' => 1, 'level' => 2, 'url' => '/role'],
            ['name' => '权限管理', 'icon' => 'fa-gear', 'pid' => 1, 'level' => 2, 'url' => '/permission'],
            ['name' => '菜单管理', 'icon' => 'fa-cog', 'pid' => 1, 'level' => 2, 'url' => '/menu']
        ]);
        DB::table('menu_role')->insert([
            ['menu_id'=>1,'role_id'=>1],
            ['menu_id'=>2,'role_id'=>1],
            ['menu_id'=>3,'role_id'=>1],
            ['menu_id'=>4,'role_id'=>1],
            ['menu_id'=>5,'role_id'=>1],
        ]);
    }
}
