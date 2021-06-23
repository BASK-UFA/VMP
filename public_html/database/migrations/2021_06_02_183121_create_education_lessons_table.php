<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'education_lessons',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('program_id')->unsigned();
                $table->foreign('program_id')->references('id')->on('education_programs');
                $table->bigInteger('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                $table->string('image')->nullable();
                $table->string('name')->default('Неизвестно');
                $table->text('excerpt')->nullable();
                $table->text('content_raw');
                $table->text('content_html');
                $table->softDeletes();
                $table->timestamps();
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
        Schema::dropIfExists('education_lessons');
    }
}
