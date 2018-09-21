<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('name_roles_id')->unsigned()->nullable(false);
            $table->foreign('name_roles_id')->references('id')->on('named_roles');
            $table->integer('role_id')->unsigned()->nullable(false);
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('map_roles');
    }
}
