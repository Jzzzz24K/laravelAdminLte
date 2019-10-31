<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('菜单名称');
            $table->string('icon')->comment('菜单标识');
            $table->integer('pid')->default(0)->comment('父级菜单id');
            $table->integer('level')->comment('菜单等级');
            $table->string('url')->default('#')->comment('菜单路由地址');
            $table->integer('status')->default(1)->comment('菜单状态，0关闭，1开启');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
