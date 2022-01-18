<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_group', function (Blueprint $table) {
            $table->id();
            $table->string('group')->nullable(); //กลุ่ม
            $table->string('exam_id')->nullable();
            $table->string('type')->nullable(); //ประเภท เช่น สอบ1
            $table->integer('summation')->nullable(); //รวมคะแนน จากอาจารย์มีเกณฑ์ผ่าน
            $table->string('status')->nullable(); //สรุปผลผ่านไม่ผ่าน

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
        Schema::dropIfExists('exam_group');
    }
}
