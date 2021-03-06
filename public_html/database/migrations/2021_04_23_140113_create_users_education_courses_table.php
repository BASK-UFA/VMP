<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersEducationCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'users_education_courses',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->string('user_name');
                $table->string('user_phone');
                $table->unsignedBigInteger('course_id');
                $table->boolean('is_checked')->default(false);
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('course_id')->references('id')->on('education_courses');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_education_courses');
    }
}
