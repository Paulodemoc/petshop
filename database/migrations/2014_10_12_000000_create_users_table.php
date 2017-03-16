<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->integer('tipo');
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
            //$table->timestamps();
        });

        DB::table('users')->insert(
            array(
              'nome' => 'admin',
              'email' => 'admin@admin.com',
              'senha' => 'admin',
              'tipo' => 2,
              'remember_token' => ''
            )
        );

        DB::table('users')->insert(
            array(
              'nome' => 'gui',
              'email' => 'gui@gmail.com',
              'senha' => '123',
              'tipo' => 1,
              'remember_token' => ''
            )
        );

        DB::table('users')->insert(
            array(
              'nome' => 'operador',
              'email' => 'operador@gmail.com',
              'senha' => 'operador',
              'tipo' => 3,
              'remember_token' => ''
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
