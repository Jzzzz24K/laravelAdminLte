<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Permission::class,1)->create();
        DB::table('permission_role')->insert([
            'permission_id'=>1,
            'role_id' => 1
        ]);
    }
}
