<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsModeratedForBlogPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'blog_posts',
            function (Blueprint $table) {
                $table->boolean('is_moderated')->default(false);
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
        Schema::table(
            'blog_posts',
            function (Blueprint $table) {
                $table->dropColumn('is_moderated');
            }
        );
    }
}
