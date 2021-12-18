<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Group extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group', function (Blueprint $table) {
            $table->id();
            $table->string('std_first');
            $table->string('std_second');
            $table->string('status')->default('warning');
            $table->string('teacher')->nullable();
            $table->string('co_teacher')->nullable();
            $table->string('co_teacher_2')->nullable();
            $table->string('co_teacher_3')->nullable();
            $table->string('group_name')->nullable();
            $table->text('path_img_group')->nullable();
            $table->text('path_proposal')->nullable();
            $table->text('path_ch1')->nullable();
            $table->text('path_ch2')->nullable();
            $table->text('path_ch3')->nullable();
            $table->text('path_ch4')->nullable();
            $table->text('path_ch5')->nullable();
            $table->text('path_poster')->nullable();
            $table->text('hosting_project')->nullable();
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
        Schema::dropIfExists('group');
    }
}
