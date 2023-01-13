<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('start_date')->nullable();
            $table->text('lessons_days')->nullable();

            $table->integer('subject_id')->unsigned()->index();
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('default_teacher_id')->unsigned()->index();
            $table->foreign('default_teacher_id')->references('id')->on('users')
                ->onUpdate('cascade');

            $table->integer('easy_course_id')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
