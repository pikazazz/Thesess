<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointTransection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('point_transection', function (Blueprint $table) {
            $table->id();
            $table->string('group')->nullable(); //กลุ่ม
            $table->string('exam_id')->nullable();
            $table->string('type')->nullable(); //ประเภท เช่น สอบ1
            $table->string('teacher_id')->nullable();
            $table->integer('point')->nullable();
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
        Schema::dropIfExists('point_transection');
    }
}
