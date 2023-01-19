<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');
            $table->boolean('completed')->default(False);

            $table->index('user_id', 'user_course_user_idx');
            $table->index('course_id', 'user_course_course_idx');

            $table->foreign('user_id', 'user_course_user_fk')->on('users')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('course_id', 'user_course_course_fk')->on('courses')->references('id')->cascadeOnUpdate()->cascadeOnDelete();

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
        Schema::dropIfExists('course_users');
    }
}
