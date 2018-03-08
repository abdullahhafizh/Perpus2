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
            $table->string('username')->unique();
            $table->string('password');
            $table->string('status')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(                
                'username' => 'adminadmin',
                'password' => bcrypt('adminadmin'),                
                'status' => '1',
            )
        );
        DB::table('users')->insert(
            array(                
                'username' => 'useruser',
                'password' => bcrypt('useruser'),                
                'status' => '0',
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
