<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'education_programs',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name')->default('Без названия');
                $table->string('image')->default('images/lesson-default.png');
                $table->bigInteger('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('education_programs');
    }
}
