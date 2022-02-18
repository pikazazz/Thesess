<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeployList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deploy_list', function (Blueprint $table) {
            $table->id();
            $table->string('Group')->nullable();
            $table->string('Fornt_End_Path')->nullable();
            $table->string('Back_End_Path')->nullable();
            $table->string('Type_Fornt')->nullable();
            $table->string('Type_BackEnd')->nullable();
            $table->string('User_Database')->nullable();
            $table->string('Password_Database')->nullable();
            $table->string('Database')->nullable();
            $table->string('Database_Type')->nullable();
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
        Schema::dropIfExists('deploy_list');
    }
}
