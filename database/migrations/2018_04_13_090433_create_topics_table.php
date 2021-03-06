<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('body');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->default(0);
            $table->integer('reply_count')->unsigned()->default(0);
            $table->integer('view_count')->unsigned()->default(0);
            $table->integer('last_reply_user_id')->unsigned()->default(0)->integer()->unsighed();
            $table->text('excerpt');
            $table->string('slug')->nullable
                ();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('topics');
    }
}
