<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->integer('lesson_number');
            $table->text('lesson_recording')->nullable();
            $table->timestamp('date');

            $table->integer('subject_material_id')->unsigned()->index();
            $table->foreign('subject_material_id')->references('id')->on('subject_materials')
                ->onUpdate('cascade');

            $table->integer('course_id')->unsigned()->index();
            $table->foreign('course_id')->references('id')->on('courses')
                ->onUpdate('cascade');

            $table->integer('substitute_teacher_id')->unsigned()->index()->nullable();
            $table->foreign('substitute_teacher_id')->references('id')->on('users')
                ->onUpdate('cascade');

            $table->integer('homework_id')->unsigned()->index()->nullable();
            $table->foreign('homework_id')->references('id')->on('home_works')
                ->onUpdate('cascade');


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
        Schema::dropIfExists('lessons');
    }
}
