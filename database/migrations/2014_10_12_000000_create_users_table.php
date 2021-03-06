<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            //$table->string('nombreusuario',15)->unique();
            $table->string('nombreusuario',30)->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('idDireccion')->unsigned();
            $table->foreign('idDireccion')->references('id')->on('direcciones');
            $table->string('estado')->default('Activo');
            $table->rememberToken();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
